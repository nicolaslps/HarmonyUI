import * as dialog from "@zag-js/dialog";
import { VanillaMachine, normalizeProps, spreadProps } from "@zag-js/vanilla";
import ZagController from "./zag_base.js";

export default class extends ZagController {
    static values = {
        open: Boolean,
        role: { type: String, default: "dialog" },
        preventScroll: { type: Boolean, default: true },
        closeOnInteractOutside: { type: Boolean, default: true },
        closeOnEscape: { type: Boolean, default: true },
        modal: { type: Boolean, default: true },
        ariaLabel: { type: String, default: "" },
        dir: { type: String, default: "" },
    };

    connect() {
        this.machine = new VanillaMachine(dialog.machine, {
            id: this.element.id,
            defaultOpen: this.openValue,
            role: this.roleValue,
            preventScroll: this.preventScrollValue,
            closeOnInteractOutside: this.closeOnInteractOutsideValue,
            closeOnEscape: this.closeOnEscapeValue,
            modal: this.modalValue,
            "aria-label": this.ariaLabelValue || undefined,
            dir: this.dirValue || document.documentElement.dir || undefined,
            initialFocusEl: () => this.part("content")?.querySelector("[data-autofocus],[autofocus]") ?? this.part("content"),
            finalFocusEl: () => document.querySelector(`[data-dialog-final-focus="${this.element.id}"]`) ?? undefined,
            onEscapeKeyDown: (event) => {
                if (!this.dispatchCancel()) {
                    event.preventDefault();
                }
            },
            onInteractOutside: (event) => {
                if (!this.dispatchCancel()) {
                    event.preventDefault();
                }
            },
        });

        this.portalParts();

        this.onCommand = this.onCommand.bind(this);
        this.element.addEventListener("command", this.onCommand);

        this.element.show = this.show.bind(this);
        this.element.hide = this.hide.bind(this);

        this.wasOpen = this.openValue;
        this.unsubscribe = this.machine.subscribe(() => this.render());
        this.machine.start();
        this.render();
    }

    disconnect() {
        delete this.element.show;
        delete this.element.hide;
        this.element.removeEventListener("command", this.onCommand);
        this.unsubscribe?.();
        this.machine.stop();

        if (!this.element.isConnected) {
            this.part("backdrop")?.remove();
            this.part("positioner")?.remove();
        }
    }

    portalParts() {
        const backdrop = this.part("backdrop");
        const positioner = this.part("positioner");

        if (backdrop) {
            document.body.append(backdrop);
        }

        if (positioner) {
            document.body.append(positioner);
        }
    }

    show() {
        dialog.connect(this.machine.service, normalizeProps).setOpen(true);
    }

    hide() {
        if (!this.dispatchCancel()) {
            return;
        }

        dialog.connect(this.machine.service, normalizeProps).setOpen(false);
    }

    onCommand(event) {
        const api = dialog.connect(this.machine.service, normalizeProps);

        if (event.command === "--show-modal") {
            api.setOpen(true);
        } else if (event.command === "--close" && this.dispatchCancel()) {
            api.setOpen(false);
        }
    }

    dispatchCancel() {
        return this.element.dispatchEvent(new CustomEvent("hui:dialog:cancel", { bubbles: true, cancelable: true }));
    }

    render() {
        const api = dialog.connect(this.machine.service, normalizeProps);

        if (api.open !== this.wasOpen) {
            this.wasOpen = api.open;
            this.element.dispatchEvent(new CustomEvent(api.open ? "hui:dialog:open" : "hui:dialog:close", { bubbles: true }));
        }

        for (const trigger of document.querySelectorAll(`[command="--show-modal"][commandfor="${this.element.id}"]`)) {
            trigger.setAttribute("aria-expanded", String(api.open));
        }

        this.spreadPart("backdrop", api.getBackdropProps());

        const positioner = this.part("positioner");
        if (positioner) {
            positioner.hidden = !api.open;
            spreadProps(positioner, api.getPositionerProps());
        }

        this.spreadPart("content", api.getContentProps());
        this.spreadPart("title", api.getTitleProps());
        this.spreadPart("description", api.getDescriptionProps());
    }
}
