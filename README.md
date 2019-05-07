# Text Read More


Works by adding a macro to Laravel Nova `Text` which is extended by `TextArea` so it works for both.

### Install

```$xslt
composer require mattsplat/readmore
```

### Usage

```$xslt
Textarea::make('Notes')->nullable(),
Textarea::make('Notes')
                ->onlyOnIndex()
                ->readMore(),
```

with options

```$xslt
Textarea::make('Notes')->nullable(),
Textarea::make('Notes')
                ->onlyOnIndex()
                ->readMore(['mask' => 'Look Here', 'max' => 5]),
```

or

```$xslt

Text::make('Notes')->readMore(),

```
