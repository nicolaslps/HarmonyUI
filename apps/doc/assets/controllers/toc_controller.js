import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['link'];
    static values = {
        offset: { type: Number, default: 0 },
    };

    connect() {
        this.visibleIds = new Set();
        this.linksById = new Map();
        this.observer = new IntersectionObserver((entries) => this.#toggle(entries), {
            rootMargin: `-${this.offsetValue}px 0px 0px 0px`,
        });

        this.linkTargets.forEach((link) => {
            const id = decodeURIComponent(link.hash.slice(1));
            const heading = document.getElementById(id);
            if (heading) {
                this.linksById.set(id, link);
                this.observer.observe(heading);
            }
        });
    }

    disconnect() {
        this.observer.disconnect();
    }

    #toggle(entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                this.visibleIds.add(entry.target.id);
            } else {
                this.visibleIds.delete(entry.target.id);
            }
        });

        if (this.visibleIds.size === 0) {
            return;
        }

        this.linksById.forEach((link, id) => {
            link.toggleAttribute('data-active', this.visibleIds.has(id));
        });
    }
}
