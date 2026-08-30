# Contributing

Thanks for taking the time to contribute.

## Setup

```bash
git clone https://github.com/mattsplat/readmore
cd readmore
composer install
```

`composer install` pulls `laravel/nova`, so you need Nova credentials configured:

```bash
composer config --auth http-basic.nova.laravel.com "you@example.com" "your-license-key"
```

No Nova license? Pint (`composer lint` / `composer format`) still works without
one, and CI runs it on every push. A maintainer runs `composer test` /
`composer analyse` before release.

## Working on the PHP side

```bash
composer test      # PHPUnit
composer lint      # Pint (code style, dry run)
composer format    # Pint (apply fixes)
composer analyse   # PHPStan / Larastan
```

## Working on the front-end

The Vue components live in `resources/js`. The compiled `dist/js/field.js` is
committed so the package works with no build step, so **rebuild it whenever you
change the source**:

```bash
npm run nova:install   # once, inside a Nova app checkout
npm run prod
```

Commit the rebuilt `dist/js/field.js` in the same PR.

## Pull requests

- Target the `master` branch.
- Add an entry to `CHANGELOG.md` under **Unreleased**.
- Keep changes focused; one concern per PR.
- Breaking changes need a note in `UPGRADE.md`.
