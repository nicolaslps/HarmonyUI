import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        confirmDialog: String,
        closeTrigger: String,
        discard: String,
    };

    connect() {
        this.element.addEventListener('hui:dialog:beforeclose', this.onBeforeClose);
        this.discardElement?.addEventListener('click', this.onDiscard);
    }

    disconnect() {
        this.element.removeEventListener('hui:dialog:beforeclose', this.onBeforeClose);
        this.discardElement?.removeEventListener('click', this.onDiscard);
    }

    get discardElement() {
        return document.getElementById(this.discardValue);
    }

    onBeforeClose = (event) => {
        if (event.detail?.source?.id === this.closeTriggerValue) {
            return;
        }

        event.preventDefault();
        document.getElementById(this.confirmDialogValue)?.dispatchEvent(
            new CommandEvent('command', { command: '--show-modal', bubbles: true, cancelable: true }),
        );
    };

    onDiscard = () => {
        document.getElementById(this.closeTriggerValue)?.click();
    };
}
