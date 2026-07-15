/*
 * On-request rendering entry point: `node render.mjs <title> <description>`
 * writes the PNG to stdout. Called by App\Controller\OgImageController on a
 * cache miss.
 */

import { renderCard } from './card.mjs';

const [title = '', description = ''] = process.argv.slice(2);

process.stdout.write(await renderCard(title, description));
