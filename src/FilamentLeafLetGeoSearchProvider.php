<?php

namespace Heloufir\FilamentLeafLetGeoSearch;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use ZeroDaHero\LaravelWorkflow\Facades\WorkflowFacade;
use ZeroDaHero\LaravelWorkflow\WorkflowServiceProvider;
use Illuminate\Foundation\AliasLoader;

class FilamentLeafLetGeoSearchProvider extends PluginServiceProvider
{

    protected array $styles = [
        'filament-leaflet-geosearch-leaflet-styles' => __DIR__ . '/../dist/css/leaflet.css',
        'filament-leaflet-geosearch-geosearch-styles' => __DIR__ . '/../dist/css/geosearch.css',
    ];

    protected array $beforeCoreScripts = [
        'filament-leaflet-geosearch-leaflet-scripts' => __DIR__ . '/../dist/js/leaflet.js',
        'filament-leaflet-geosearch-geosearch-scripts' => __DIR__ . '/../dist/js/geosearch.umd.js',
    ];

    public function configurePackage(Package $package): void
    {
        // Package name
        $package->name('filament-leaflet-geosearch');

        // Views
        $package->hasViews();

        $this->publishes([
            __DIR__.'/../dist/css/images' => public_path('filament/assets/images'),
        ], 'filament-leaflet-geosearch-assets');
    }

}
