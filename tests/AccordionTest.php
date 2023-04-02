<?php

use Sematico\FilamentAccordion\Forms\Components\Fields\Accordions\Accordion;

it('can set label', function () {
    $accordion = Accordion::make('Label here');

    expect($accordion->getLabel())->toBe('Label here');
});

it('can set description', function () {
    $accordion = Accordion::make('Label here');
    $accordion->description('description here');

    expect($accordion->getDescription())->toBe('description here');
});
