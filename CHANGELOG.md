# Changelog

## Unreleased

### Added

- MIT `LICENSE` file.
- PHPUnit test suite (`orchestra/testbench`), Pint, and PHPStan / Larastan, run
  in CI against PHP 8.1–8.3 (incl. a `prefer-lowest` run).
- Repo meta: `CONTRIBUTING.md`, `SECURITY.md`, issue / PR templates, Dependabot,
  `.editorconfig`, and a README preview image.
- `->lessLabel()` to customise the collapse control's label.

### Changed

- The reveal / collapse control is now a focusable `<button>` with
  `aria-expanded` and <kbd>Enter</kbd> / <kbd>Space</kbd> support, instead of a
  click handler on the whole paragraph.
- Truncation now happens on a word boundary rather than mid-word.
- Newlines in the text are preserved (`white-space: pre-line`).
- Default `mask` is now `'...'` (was `' ...'`); spacing before the control is
  handled by the component.

### Fixed

- Expanded text now shows a "Show less" control to collapse it again.

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
