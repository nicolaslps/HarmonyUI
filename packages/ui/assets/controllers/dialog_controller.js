import * as dialog from "@zag-js/dialog";
import { VanillaMachine, normalizeProps, spreadProps } from "@zag-js/vanilla";
import ZagController from "./zag_base.js";

export default class extends ZagController {
    static values = {
        open: Boolean,
    };

    connect() {
        this.machine = new VanillaMachine(dialog.machine, {
            id: this.element.id,
            defaultOpen: this.openValue,
        });

        this.portalParts();

        this.onCommand = this.onCommand.bind(this);
        this.element.addEventListener("command", this.onCommand);

        this.unsubscribe = this.machine.subscribe(() => this.render());
        this.machine.start();
        this.render();
    }

    disconnect() {
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

    onCommand(event) {
        const api = dialog.connect(this.machine.service, normalizeProps);

        if (event.command === "--show-modal") {
            api.setOpen(true);
        } else if (event.command === "--close") {
            api.setOpen(false);
        }
    }

    render() {
        const api = dialog.connect(this.machine.service, normalizeProps);

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
    }
}
