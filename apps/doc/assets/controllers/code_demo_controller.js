import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['code', 'fade', 'button', 'copy'];

    show() {
        this.codeTarget.classList.remove('max-h-28', 'select-none', 'overflow-y-hidden');
        this.fadeTarget.remove();
        this.buttonTarget.parentElement.remove();
        this.copyTarget.classList.remove('hidden');
    }
}
