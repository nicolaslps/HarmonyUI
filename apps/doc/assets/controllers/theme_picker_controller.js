import { Controller } from '@hotwired/stimulus';

const PRIMARY_KEY = 'primary';
const BASE_KEY = 'base';
const RADIUS_KEY = 'radius';
const THEME_KEY = 'theme';
const THEME_CSS_KEY = 'theme_css';
const DEFAULT_PRIMARY = 'neutral';
const DEFAULT_BASE = 'neutral';
const DEFAULT_RADIUS = '0.625rem';
const DEFAULT_MODE = 'light';
const NEUTRAL_STEPS = [50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950];

function readValue(paramName, storageKey, fallback) {
    const params = new URLSearchParams(window.location.search);
    return params.get(paramName) || window.localStorage.getItem(storageKey) || fallback;
}

export default class extends Controller {
    static values = { primaries: Array };

    static targets = [
        'primarySwatch',
        'baseSwatch',
        'radiusButton',
        'primarySelect',
        'baseSelect',
        'radiusSelect',
        'modeToggleButton',
        'modeLightIcon',
        'modeDarkIcon',
        'modeLabel',
    ];

    connect() {
        this.primary = readValue('primary', PRIMARY_KEY, DEFAULT_PRIMARY);
        this.base = readValue('base', BASE_KEY, DEFAULT_BASE);
        this.radius = readValue('radius', RADIUS_KEY, DEFAULT_RADIUS);
        this.mode = readValue('mode', THEME_KEY, DEFAULT_MODE);
        this.#applyUi();
        this.#applyTheme();
    }

    setPrimary(event) {
        this.primary = event.currentTarget.dataset.primary ?? event.currentTarget.value;
        this.#update();
    }

    setBase(event) {
        this.base = event.currentTarget.dataset.base ?? event.currentTarget.value;
        this.#update();
    }

    setRadius(event) {
        this.radius = event.currentTarget.dataset.radiusValue ?? event.currentTarget.value;
        this.#update();
    }

    toggleMode() {
        this.mode = this.mode === 'dark' ? 'light' : 'dark';
        this.#update();
    }

    reset() {
        this.primary = DEFAULT_PRIMARY;
        this.base = DEFAULT_BASE;
        this.radius = DEFAULT_RADIUS;
        this.#update();
    }

    #update() {
        this.#applyUi();
        this.#applyTheme();
        this.#persist();
    }

    #syncActiveState(targets, datasetKey, value) {
        targets.forEach((el) => {
            const active = el.dataset[datasetKey] === value;
            el.toggleAttribute('data-active', active);
            el.setAttribute('aria-pressed', String(active));
        });
    }

    #applyUi() {
        const { primary, base, radius, mode } = this;

        this.#syncActiveState(this.primarySwatchTargets, 'primary', primary);
        this.#syncActiveState(this.baseSwatchTargets, 'base', base);
        this.#syncActiveState(this.radiusButtonTargets, 'radiusValue', radius);

        if (this.hasPrimarySelectTarget) {
            this.primarySelectTarget.value = primary;
        }
        if (this.hasBaseSelectTarget) {
            this.baseSelectTarget.value = base;
        }
        if (this.hasRadiusSelectTarget) {
            this.radiusSelectTarget.value = radius;
        }

        const isDark = mode === 'dark';
        this.modeToggleButtonTarget.setAttribute('aria-pressed', String(isDark));
        this.modeLightIconTarget.classList.toggle('hidden', !isDark);
        this.modeDarkIconTarget.classList.toggle('hidden', isDark);
        this.modeLabelTarget.textContent = isDark ? 'Light' : 'Dark';

        document.documentElement.classList.toggle('dark', isDark);
    }

    #primaryColors(primary, mode) {
        const entry = this.primariesValue.find((candidate) => candidate.name === primary)
            ?? this.primariesValue.find((candidate) => candidate.name === DEFAULT_PRIMARY);
        return entry[mode];
    }

    #applyTheme() {
        const { primary, base, radius, mode } = this;
        const root = document.documentElement.style;

        const { accent, content, foreground } = this.#primaryColors(primary, mode);
        root.setProperty('--color-accent', accent);
        root.setProperty('--color-accent-content', content);
        root.setProperty('--color-accent-foreground', foreground);
        root.setProperty('--radius', radius);

        NEUTRAL_STEPS.forEach((step) => {
            if (base === DEFAULT_BASE) {
                root.removeProperty(`--color-neutral-${step}`);
            } else {
                root.setProperty(`--color-neutral-${step}`, `var(--color-${base}-${step})`);
            }
        });

        this.#applySnippet();
    }

    #neutralReassignment(base) {
        return NEUTRAL_STEPS.map((step) => `    --color-neutral-${step}: var(--color-${base}-${step});`).join('\n');
    }

    #applySnippet() {
        const codeEl = document.querySelector('[data-theme-picker-target="snippetCode"]');
        const copyButtonEl = document.querySelector('[data-theme-picker-target="snippetCopyButton"]');
        if (!codeEl || !copyButtonEl) {
            return;
        }

        const { primary, base, radius } = this;
        const light = this.#primaryColors(primary, 'light');
        const dark = this.#primaryColors(primary, 'dark');

        let baseBlock = '';
        if (base !== DEFAULT_BASE) {
            baseBlock = `/* Re-assign the base gray */\n@theme {\n${this.#neutralReassignment(base)}\n}\n\n`;
        }

        let radiusLine = '';
        if (radius !== DEFAULT_RADIUS) {
            radiusLine = `\n\n    --radius: ${radius};`;
        }

        const snippet = `${baseBlock}@theme {
    --color-accent: ${light.accent};
    --color-accent-content: ${light.content};
    --color-accent-foreground: ${light.foreground};${radiusLine}
}

@layer theme {
    .dark {
        --color-accent: ${dark.accent};
        --color-accent-content: ${dark.content};
        --color-accent-foreground: ${dark.foreground};
    }
}`;

        codeEl.textContent = snippet;
        copyButtonEl.dataset.clipboardContentValue = snippet;
    }

    #buildThemeCss() {
        const { primary, base, radius } = this;
        const light = this.#primaryColors(primary, 'light');
        const dark = this.#primaryColors(primary, 'dark');

        let neutralLines = '';
        if (base !== DEFAULT_BASE) {
            neutralLines = `\n${this.#neutralReassignment(base)}`;
        }

        return `:root {
    --color-accent: ${light.accent};
    --color-accent-content: ${light.content};
    --color-accent-foreground: ${light.foreground};
    --radius: ${radius};${neutralLines}
}

.dark {
    --color-accent: ${dark.accent};
    --color-accent-content: ${dark.content};
    --color-accent-foreground: ${dark.foreground};
}`;
    }

    #persist() {
        const { primary, base, radius, mode } = this;

        window.localStorage.setItem(PRIMARY_KEY, primary);
        window.localStorage.setItem(BASE_KEY, base);
        window.localStorage.setItem(RADIUS_KEY, radius);
        window.localStorage.setItem(THEME_KEY, mode);
        window.localStorage.setItem(THEME_CSS_KEY, this.#buildThemeCss());

        const url = new URL(window.location.href);
        url.searchParams.set('primary', primary);
        url.searchParams.set('base', base);
        url.searchParams.set('radius', radius);
        url.searchParams.set('mode', mode);
        window.history.replaceState(null, '', url);
    }
}
