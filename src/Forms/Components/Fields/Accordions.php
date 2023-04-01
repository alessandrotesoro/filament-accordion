<?php

namespace Sematico\FilamentAccordion\Forms\Components\Fields;

use Closure;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Concerns\CanBeCompacted;
use Filament\Support\Concerns\HasExtraAlpineAttributes;

class Accordions extends Component
{
    use CanBeCompacted;
    use HasExtraAlpineAttributes;

    protected string $view = 'filament-accordion::forms.components.fields.accordions';

    final public function __construct(string $label)
    {
        $this->label($label);
    }

    public static function make(string $label): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }

    public function accordions(array|Closure $accordions): static
    {
        $this->childComponents($accordions);

        return $this;
    }
}
