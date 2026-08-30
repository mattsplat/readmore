<?php

namespace Mattsplat\Readmore\Tests;

use Mattsplat\Readmore\ReadMore;

class ReadMoreFieldTest extends TestCase
{
    public function test_it_uses_the_read_more_component(): void
    {
        $this->assertSame('read-more', ReadMore::make('Notes')->component);
    }

    public function test_it_shows_on_index_by_default(): void
    {
        $this->assertTrue(ReadMore::make('Notes')->showOnIndex);
    }

    public function test_it_has_sensible_meta_defaults(): void
    {
        $meta = ReadMore::make('Notes')->meta();

        $this->assertSame(20, $meta['characters']);
        $this->assertSame('...', $meta['mask']);
        $this->assertSame('Show less', $meta['lessLabel']);
        $this->assertSame(5, $meta['rows']);
    }

    public function test_characters_is_configurable_and_never_negative(): void
    {
        $this->assertSame(60, ReadMore::make('Notes')->characters(60)->meta()['characters']);
        $this->assertSame(0, ReadMore::make('Notes')->characters(-5)->meta()['characters']);
    }

    public function test_mask_accepts_text_or_html(): void
    {
        $this->assertSame('… more', ReadMore::make('Notes')->mask('… more')->meta()['mask']);
        $this->assertSame('<b>x</b>', ReadMore::make('Notes')->mask('<b>x</b>')->meta()['mask']);
    }

    public function test_less_label_is_configurable(): void
    {
        $this->assertSame('Collapse', ReadMore::make('Notes')->lessLabel('Collapse')->meta()['lessLabel']);
    }

    public function test_rows_is_configurable_and_at_least_one(): void
    {
        $this->assertSame(8, ReadMore::make('Notes')->rows(8)->meta()['rows']);
        $this->assertSame(1, ReadMore::make('Notes')->rows(0)->meta()['rows']);
    }

    public function test_the_fluent_setters_are_chainable(): void
    {
        $field = ReadMore::make('Notes')
            ->characters(30)
            ->mask('…')
            ->lessLabel('less')
            ->rows(3);

        $this->assertInstanceOf(ReadMore::class, $field);
        $this->assertEquals(
            ['characters' => 30, 'mask' => '…', 'lessLabel' => 'less', 'rows' => 3],
            $field->meta()
        );
    }
}
