/*
 * Shared Open Graph card renderer (Satori + resvg): HTML + Tailwind classes
 * in, 1200x630 PNG out. Used by render.mjs (on-request, called from PHP) and
 * warm.mjs (build-time pre-generation of every documentation page).
 */

import { readFile } from 'node:fs/promises';
import { createHash } from 'node:crypto';
import path from 'node:path';
import satori from 'satori';
import { html } from 'satori-html';
import { Resvg } from '@resvg/resvg-js';

const root = import.meta.dirname;

const BACKGROUND = '#FCFBF8';
const FOREGROUND = '#2B2B2B';
const MUTED = '#6F6A63';
const BRAND = '#EA722E';
const BORDER = '#E8E4DD';

const logo = (await readFile(path.resolve(root, '../assets/icons/harmonyui.svg'), 'utf8')).replace(
    /currentColor/g,
    BRAND,
);
const logoUri = `data:image/svg+xml;base64,${Buffer.from(logo).toString('base64')}`;

const fontFile = (weight) =>
    readFile(path.join(root, `node_modules/@fontsource/inter/files/inter-latin-${weight}-normal.woff`));

const fonts = [
    { name: 'Inter', weight: 400, data: await fontFile(400) },
    { name: 'Inter', weight: 600, data: await fontFile(600) },
    { name: 'Inter', weight: 700, data: await fontFile(700) },
];

function card(title, description) {
    return html`
        <div
            tw="relative flex h-full w-full flex-col border border-[${BORDER}] bg-[${BACKGROUND}] p-20"
            style="font-family: Inter"
        >
            <img src="${logoUri}" width="620" height="620" tw="absolute left-[780px] top-[5px]" style="opacity: 0.08" />
            <div tw="flex items-center">
                <img src="${logoUri}" width="52" height="52" />
                <span tw="ml-4 text-[34px] font-semibold text-[${FOREGROUND}]">HarmonyUI</span>
            </div>
            <div tw="flex flex-1 flex-col justify-center">
                <h1
                    tw="mb-0 max-w-[1000px] text-[64px] leading-[1.15] text-[${FOREGROUND}]"
                    style="display: block; font-weight: 700; line-clamp: 2"
                >
                    ${title}
                </h1>
                <p tw="mt-7 mb-0 max-w-[960px] text-[28px] leading-[1.55] text-[${MUTED}]" style="display: block; line-clamp: 2">
                    ${description}
                </p>
            </div>
        </div>
    `;
}

/** @returns {Promise<Buffer>} PNG content */
export async function renderCard(title, description) {
    const svg = await satori(card(title, description), { width: 1200, height: 630, fonts });

    return new Resvg(svg, { fitTo: { mode: 'width', value: 1200 } }).render().asPng();
}

/**
 * Cache key for a title/description pair. MUST stay in sync with the hash
 * computed by App\Controller\OgImageController.
 */
export function cacheKey(title, description) {
    return createHash('sha256').update(`${title}\0${description}`).digest('hex');
}

/**
 * Same normalization as OgImageController (trim + code-point length caps),
 * so warmed cache keys match the ones computed at request time.
 */
export function normalize(title, description) {
    return [[...title.trim()].slice(0, 200).join(''), [...description.trim()].slice(0, 500).join('')];
}
