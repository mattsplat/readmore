<?php

namespace Mattsplat\Readmore;

use Laravel\Nova\Fields\Field;

class ReadMore extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'read-more';

    /**
     * Show the field on the resource index view by default.
     *
     * @var bool
     */
    public $showOnIndex = true;

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|callable|null  $attribute
     * @return void
     */
    public function __construct($name, $attribute = null, ?callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'characters' => 20,
            'mask' => '...',
            'lessLabel' => 'Show less',
            'rows' => 5,
        ]);
    }

    /**
     * Set the number of characters to show before the text is truncated.
     */
    public function characters(int $characters): static
    {
        return $this->withMeta(['characters' => max(0, $characters)]);
    }

    /**
     * Set the "read more" indicator shown after the truncated text.
     *
     * Accepts plain text or HTML (for example an inline SVG icon).
     */
    public function mask(string $mask): static
    {
        return $this->withMeta(['mask' => $mask]);
    }

    /**
     * Set the label for the control that collapses the text again.
     */
    public function lessLabel(string $label): static
    {
        return $this->withMeta(['lessLabel' => $label]);
    }

    /**
     * Set the number of rows for the textarea shown on forms.
     */
    public function rows(int $rows): static
    {
        return $this->withMeta(['rows' => max(1, $rows)]);
    }
}
