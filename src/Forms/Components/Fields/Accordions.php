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

    protected bool|null $open = false;

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

    /**
     * Set 1st accordion as open on page load.
     *
     * @param  bool  $open
     */
    public function open(bool|null $open = false): static
    {
        $this->open = $open;

        return $this;
    }

    /**
     * Determine if the 1st accordion should be open by default.
     */
    public function isOpen(): bool|null
    {
        return $this->open === true;
    }

    public function accordions(array|Closure $accordions): static
    {
        $this->childComponents($accordions);

        return $this;
    }
}
