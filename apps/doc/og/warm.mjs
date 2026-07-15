/*
 * Cache warmer: reads [title, description] pairs as JSON from stdin and
 * pre-renders their Open Graph images into the runtime cache directory
 * (`node warm.mjs [outDir]`).
 *
 * Driven by `php bin/console app:og:warm`, which derives the pairs from the
 * same services the controllers use, so warmed cache keys always match the
 * /og.png URLs the templates emit.
 */

import { writeFile, mkdir } from 'node:fs/promises';
import path from 'node:path';
import { renderCard, cacheKey, normalize } from './card.mjs';

const root = import.meta.dirname;
const outDir = path.resolve(process.argv[2] ?? path.resolve(root, '../var/og'));

let input = '';
for await (const chunk of process.stdin) {
    input += chunk;
}
const pairs = JSON.parse(input);

const started = performance.now();
await mkdir(outDir, { recursive: true });

for (const [rawTitle, rawDescription] of pairs) {
    const [title, description] = normalize(rawTitle, rawDescription);
    await writeFile(path.join(outDir, `${cacheKey(title, description)}.png`), await renderCard(title, description));
}

console.log(`Warmed ${pairs.length} Open Graph images in ${Math.round(performance.now() - started)} ms.`);
