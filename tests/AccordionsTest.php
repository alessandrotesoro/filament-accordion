<?php

use Sematico\FilamentAccordion\Forms\Components\Fields\Accordions;

it('can set label', function () {
    $accordions = Accordions::make( 'Label here' );

    expect($accordions->getLabel())->toBe( 'Label here' );
});

it('can be compact', function () {
    $accordions = Accordions::make( 'Label here' );
    $accordions->compact( true );

    expect($accordions->isCompact())->toBeTrue();
});

it('can have child components', function () {
   $accordions = Accordions::make('article')
                ->label( __( 'Article settings' ) )
                ->accordions([
                    Accordions\Accordion::make('sharing')
                        ->label( __( 'Social sharing' ) )
                        ->description( __( 'Customize sharing on social media' ) )
                        ->schema([]),
                ]);

    expect(count($accordions->getChildComponents()))->toBe(1);
});
