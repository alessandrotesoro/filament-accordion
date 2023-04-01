<?php

namespace Sematico\FilamentAccordion;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentAccordionServiceProvider extends PluginServiceProvider
{
    /**
     * Name of this package.
     */
    public static string $name = 'filament-accordion';

    protected array $styles = [
        'filament-accordion' => __DIR__.'/../resources/dist/filament-accordion.css',
    ];

    /**
     * Configure the package.
     */
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-accordion')
            ->hasViews();
    }
}
