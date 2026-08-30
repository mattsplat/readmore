# Changelog

## Unreleased

### Added

- MIT `LICENSE` file.
- PHPUnit test suite (`orchestra/testbench`) and a GitHub Actions workflow that
  runs it against PHP 8.1–8.3.

## 2.0.0 — 2026-08-30

### Changed (breaking)

- **Requires Nova 4 and PHP 8.0+.**
- Replaced the `Text::readMore()` and `Textarea::showOnIndex()` macros with a
  dedicated `Mattsplat\Readmore\ReadMore` field.
  - `->readMore(['max' => 5])` → `ReadMore::make(...)->characters(5)`
  - `->readMore(['mask' => '...'])` → `ReadMore::make(...)->mask('...')`
- The field now also truncates on the **detail** view, and renders a textarea on
  create / update forms.
- Frontend rewritten for Vue 3 (Nova 4).

### Fixed

- The read-more state is no longer mutated from a computed property during
  render (removed a Vue warning and the associated stale-state bugs).
- A reused component instance whose `text` prop changes now collapses back to the
  truncated view instead of staying expanded.
- No mask flash when the text length exactly equals the character limit.

## 1.0.3 and earlier

Nova 1.x support via `Text` / `Textarea` macros.
