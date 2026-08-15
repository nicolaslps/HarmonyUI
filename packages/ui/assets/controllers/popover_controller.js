import * as popover from "@zag-js/popover";
import { VanillaMachine, normalizeProps, spreadProps } from "@zag-js/vanilla";
import ZagController from "./zag_base.js";

export default class extends ZagController {
    static values = {
        open: Boolean,
        modal: { type: Boolean, default: false },
        portalled: { type: Boolean, default: true },
        autoFocus: { type: Boolean, default: true },
        closeOnInteractOutside: { type: Boolean, default: true },
        closeOnEscape: { type: Boolean, default: true },
        placement: { type: String, default: "bottom" },
        offset: { type: Number, default: 6 },
        shouldFlip: { type: Boolean, default: true },
        sameWidth: { type: Boolean, default: false },
        ariaLabel: { type: String, default: "" },
        dir: { type: String, default: "" },
    };

    connect() {
        this.machine = new VanillaMachine(popover.machine, {
            id: this.element.id,
            defaultOpen: this.openValue,
            modal: this.modalValue,
            portalled: this.portalledValue,
            autoFocus: this.autoFocusValue,
            closeOnInteractOutside: this.closeOnInteractOutsideValue,
            closeOnEscape: this.closeOnEscapeValue,
            initialFocusEl: () => this.part("content")?.querySelector("[data-autofocus],[autofocus]") ?? undefined,
            "aria-label": this.ariaLabelValue || undefined,
            dir: this.dirValue || document.documentElement.dir || undefined,
            positioning: {
                placement: this.placementValue,
                gutter: this.offsetValue,
                flip: this.shouldFlipValue,
                sameWidth: this.sameWidthValue,
            },
        });

        if (this.portalledValue) {
            this.portalParts();
        }

        this.unsubscribe = this.machine.subscribe(() => this.render());
        this.machine.start();
        this.render();
    }

    disconnect() {
        this.unsubscribe?.();
        this.machine.stop();

        if (!this.element.isConnected) {
            this.part("positioner")?.remove();
        }
    }

    portalParts() {
        const positioner = this.part("positioner");
        if (positioner) {
            document.body.append(positioner);
        }
    }

    render() {
        const api = popover.connect(this.machine.service, normalizeProps);

        for (const trigger of this.parts("trigger")) {
            spreadProps(trigger, api.getTriggerProps({ value: trigger.dataset.value || undefined }));
        }

        for (const indicator of this.parts("indicator")) {
            spreadProps(indicator, api.getIndicatorProps());
        }

        this.spreadPart("anchor", api.getAnchorProps());

        const positioner = this.part("positioner");
        if (positioner) {
            positioner.hidden = !api.open;
            spreadProps(positioner, api.getPositionerProps());
        }

        this.spreadPart("content", api.getContentProps());
        this.spreadPart("arrow", api.getArrowProps());
        this.spreadPart("title", api.getTitleProps());
        this.spreadPart("description", api.getDescriptionProps());
        this.spreadPart("close-trigger", api.getCloseTriggerProps());
    }
}
