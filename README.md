# HarmonyUI — Monorepo

Monorepo basique Symfony.

## Structure

```
.
├── apps/
│   └── doc/        Application Symfony (AssetMapper/importmap + page d'accueil « Bonjour »)
└── packages/
    └── core/       Package Symfony (bundle vide, juste importable)
```

Le package `harmonyui/core` est relié à l'app via un dépôt Composer `path`
(`apps/doc/composer.json` → `repositories`), puis symliké dans `apps/doc/vendor/`.
Son bundle `HarmonyUI\Core\HarmonyUICoreBundle` est enregistré dans
`apps/doc/config/bundles.php`.

## Lancer l'app

```bash
cd apps/doc
symfony serve        # ou : php -S 127.0.0.1:8000 -t public
```

Page d'accueil : `/` → « Bonjour ».
