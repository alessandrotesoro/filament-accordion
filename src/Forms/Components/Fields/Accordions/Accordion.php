<?php

namespace Sematico\FilamentAccordion\Forms\Components\Fields\Accordions;

use Closure;
use Filament\Forms\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class Accordion extends Component
{
    protected string $view = 'filament-accordion::forms.components.fields.accordion';

    protected string|Htmlable|Closure|null $description = null;

    final public function __construct(string $label)
    {
        $this->label($label);
        $this->id(Str::slug($label));
    }

    public static function make(string $label): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }

    public function getId(): string
    {
        return $this->getContainer()->getParentComponent()->getId().'-'.parent::getId().'-accordion';
    }

    public function description(string|Htmlable|Closure|null $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): string|Htmlable|null
    {
        return $this->evaluate($this->description);
    }
}
