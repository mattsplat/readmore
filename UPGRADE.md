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
