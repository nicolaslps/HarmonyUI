import { defineConfig } from "vite-plus";

const ignorePatterns = [
  "**/vendor/**",
  "**/var/**",
  "**/public/**",
  "**/node_modules/**",
  "apps/*/assets/vendor/**",
  "**/composer.json",
  "**/*.yaml",
  "**/*.yml",
];

export default defineConfig({
  lint: {
    ignorePatterns,
  },
  fmt: {
    ignorePatterns,
  },
});
