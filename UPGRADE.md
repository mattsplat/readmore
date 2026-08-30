# Upgrading to 2.2

Nothing to do. 2.2 only widens the `laravel/nova` constraint to `^4.0 || ^5.0`;
there are no code or API changes. `composer update mattsplat/readmore` is enough.

---

# Upgrading from 2.0 to 2.1

No API changes — `ReadMore::make()` and its methods are unchanged. A few
front-end behaviour changes to be aware of:

- The reveal / collapse control is now a `<button>` (focusable, keyboard
  operable) rather than a click handler on the whole paragraph. Only the
  indicator is clickable now, not the body text.
- Text is truncated on a word boundary instead of mid-word, so the visible
  snippet may be a few characters shorter than `characters()`.
- The default `mask` changed from `' ...'` to `'...'`; the component now adds
  the leading space itself. If you passed a custom `mask()` you may want to drop
  a leading space from it.
- Newlines in the value are now preserved on the index / detail views.

Rebuilding your own assets is not required — the package ships the compiled
bundle.

---

# Upgrading from 1.x to 2.0

Version 2.0 targets **Laravel Nova 4** and replaces the macro-based API with a
dedicated field.

## Requirements

- PHP `^8.0` (was `>=7.1`)
- `laravel/nova` `^4.0`

## API changes

### Before (1.x)

```php
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;

Textarea::make('Notes')
    ->showOnIndex()
    ->readMore(['max' => 5, 'mask' => 'Look Here']),

Text::make('Notes')->readMore(),
```

### After (2.0)

```php
use Mattsplat\Readmore\ReadMore;

ReadMore::make('Notes')
    ->characters(5)
    ->mask('Look Here'),

ReadMore::make('Notes'),
```

| 1.x                                | 2.0                              |
|------------------------------------|----------------------------------|
| `->readMore()`                     | `ReadMore::make(...)`            |
| `->readMore(['max' => N])`         | `->characters(N)`               |
| `->readMore(['mask' => '...'])`    | `->mask('...')`                 |
| `Textarea` + `->showOnIndex()`     | `ReadMore` (shows on index by default) |

## Behaviour changes

- Truncation now also applies on the **detail** view.
- The field renders a plain `<textarea>` on create / update forms; previously the
  behaviour depended on which base field (`Text` / `Textarea`) you started from.
- To hide the field from the index, use Nova's standard `->hideFromIndex()`.

## The macros are gone

`Text::readMore()` and `Textarea::showOnIndex()` no longer exist. Replace every
call site with the `ReadMore` field.
