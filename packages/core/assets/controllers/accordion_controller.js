import { Controller } from "@hotwired/stimulus";
import * as accordion from "@zag-js/accordion";
import { normalizeProps, spreadProps, VanillaMachine } from "@zag-js/vanilla";

/**
 * Bridges the Zag.js accordion machine to the markup rendered by the
 * HarmonyUI Accordion Twig components. A single instance lives on the
 * accordion root; parts are located through their `data-part` attribute.
 *
 * @see https://zagjs.com/components/react/accordion
 */
export default class extends Controller {
    static values = {
        multiple: { type: Boolean, default: false },
        collapsible: { type: Boolean, default: true },
        disabled: { type: Boolean, default: false },
        value: { type: Array, default: [] },
        dir: { type: String, default: "ltr" },
    };

    connect() {
        this.machine = new VanillaMachine(accordion.machine, {
            id: this.element.id || crypto.randomUUID(),
            multiple: this.multipleValue,
            collapsible: this.collapsibleValue,
            disabled: this.disabledValue,
            defaultValue: this.valueValue,
            dir: this.dirValue,
            onValueChange: (details) => {
                this.dispatch("change", { detail: details });
            },
        });

        this.machine.subscribe(() => this.render());
        this.machine.start();
        this.render();
    }

    disconnect() {
        this.machine?.stop();
        this.machine = null;
    }

    render() {
        const api = accordion.connect(this.machine.service, normalizeProps);

        this.spread(this.element, api.getRootProps());

        for (const item of this.items) {
            const props = {
                value: item.dataset.value,
                disabled: item.hasAttribute("data-hui-disabled"),
            };

            this.spread(item, api.getItemProps(props));

            const trigger = item.querySelector('[data-part="item-trigger"]');
            if (trigger) {
                this.spread(trigger, api.getItemTriggerProps(props));
            }

            const content = item.querySelector('[data-part="item-content"]');
            if (content) {
                this.spread(content, api.getItemContentProps(props));
            }

            const indicator = item.querySelector('[data-part="item-indicator"]');
            if (indicator) {
                this.spread(indicator, api.getItemIndicatorProps(props));
            }
        }
    }

    spread(node, attrs) {
        spreadProps(node, attrs, this.machine.scope.id);
    }

    get items() {
        // Ignore items belonging to a nested accordion instance.
        return [...this.element.querySelectorAll('[data-part="item"]')].filter(
            (item) => item.closest('[data-part="root"]') === this.element,
        );
    }
}
