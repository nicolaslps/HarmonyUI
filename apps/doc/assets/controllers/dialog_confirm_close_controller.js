import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        confirmDialog: String,
        closeTrigger: String,
        discard: String,
    };

    connect() {
        this.element.addEventListener('hui:dialog:cancel', this.onCancel);
        this.closeTriggerElement?.addEventListener('click', this.onCloseTriggerClick);
        this.discardElement?.addEventListener('click', this.onDiscard);
    }

    disconnect() {
        this.element.removeEventListener('hui:dialog:cancel', this.onCancel);
        this.closeTriggerElement?.removeEventListener('click', this.onCloseTriggerClick);
        this.discardElement?.removeEventListener('click', this.onDiscard);
    }

    get closeTriggerElement() {
        return document.getElementById(this.closeTriggerValue);
    }

    get discardElement() {
        return document.getElementById(this.discardValue);
    }

    onCloseTriggerClick = () => {
        this.skipConfirm = true;
    };

    onCancel = (event) => {
        if (this.skipConfirm) {
            this.skipConfirm = false;
            return;
        }

        event.preventDefault();
        document.getElementById(this.confirmDialogValue)?.dispatchEvent(
            new CommandEvent('command', { command: '--show-modal', bubbles: true, cancelable: true }),
        );
    };

    onDiscard = () => {
        this.closeTriggerElement?.click();
    };
}
