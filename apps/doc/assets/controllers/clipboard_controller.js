import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['icon', 'check'];
    static values = { content: String };

    async copy() {
        await navigator.clipboard.writeText(this.contentValue);

        this.iconTarget.classList.add('hidden');
        this.checkTarget.classList.remove('hidden');

        window.clearTimeout(this.timeout);
        this.timeout = window.setTimeout(() => {
            this.iconTarget.classList.remove('hidden');
            this.checkTarget.classList.add('hidden');
        }, 1500);
    }
}
