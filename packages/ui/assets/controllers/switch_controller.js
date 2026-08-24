import * as zagSwitch from "@zag-js/switch";
import { VanillaMachine, normalizeProps, spreadProps } from "@zag-js/vanilla";
import ZagController from "./zag_base.js";

export default class extends ZagController {
    static values = {
        inputId: String,
        checked: Boolean,
        disabled: Boolean,
        invalid: Boolean,
        required: Boolean,
        readOnly: Boolean,
        name: String,
        value: { type: String, default: "on" },
        form: String,
        dir: String,
    };

    connect() {
        this.machine = new VanillaMachine(zagSwitch.machine, {
            id: this.element.id,
            ids: { root: this.element.id, hiddenInput: this.inputIdValue },
            defaultChecked: this.checkedValue,
            disabled: this.disabledValue,
            invalid: this.invalidValue,
            required: this.requiredValue,
            readOnly: this.readOnlyValue,
            name: this.nameValue || undefined,
            value: this.valueValue,
            form: this.formValue || undefined,
            dir: this.dirValue || document.documentElement.dir || undefined,
            onCheckedChange: ({ checked }) => {
                this.element.dispatchEvent(new CustomEvent("hui:switch:change", { detail: { checked }, bubbles: true }));
            },
        });

        this.onCommand = this.onCommand.bind(this);
        this.element.addEventListener("command", this.onCommand);

        this.unsubscribe = this.machine.subscribe(() => this.render());
        this.render();
        this.machine.start();
    }

    disconnect() {
        this.element.removeEventListener("command", this.onCommand);
        this.unsubscribe?.();
        this.machine.stop();
    }

    onCommand(event) {
        const api = zagSwitch.connect(this.machine.service, normalizeProps);

        if (event.command === "--check") {
            api.setChecked(true);
        } else if (event.command === "--uncheck") {
            api.setChecked(false);
        } else if (event.command === "--toggle") {
            api.toggleChecked();
        }
    }

    render() {
        const api = zagSwitch.connect(this.machine.service, normalizeProps);

        spreadProps(this.element, api.getRootProps());
        this.spreadPart("control", api.getControlProps());
        this.spreadPart("thumb", api.getThumbProps());
        this.spreadPart("hidden-input", api.getHiddenInputProps());
    }
}
