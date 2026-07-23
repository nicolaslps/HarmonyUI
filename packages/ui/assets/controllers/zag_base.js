import { Controller } from "@hotwired/stimulus";
import { spreadProps } from "@zag-js/vanilla";

export default class extends Controller {
    part(name) {
        return this.parts(name)[0];
    }

    parts(name) {
        return [...this.element.querySelectorAll(`[data-part="${name}"]`)].filter(
            (el) => el.closest(`[data-controller~="${this.identifier}"]`) === this.element,
        );
    }

    spreadPart(name, props) {
        const el = this.part(name);
        if (el) {
            spreadProps(el, props);
        }
    }
}
