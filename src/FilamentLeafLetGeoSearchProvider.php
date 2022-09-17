<?php

namespace Heloufir\FilamentLeafLetGeoSearch;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ZeroDaHero\LaravelWorkflow\Facades\WorkflowFacade;
use ZeroDaHero\LaravelWorkflow\WorkflowServiceProvider;
use Illuminate\Foundation\AliasLoader;

class FilamentLeafLetGeoSearchProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        // Package name
        $package->name('filament-leaflet-geosearch');

        // Views
        $package->hasViews();

        // Publish assets
        $this->publishes(array_merge([
            __DIR__ . '/../dist/css/images' => public_path('filament/assets/css/images'),
        ], array_merge([
            __DIR__ . '/../dist/css/leaflet.css' => public_path('filament/assets/css/leaflet.css'),
            __DIR__ . '/../dist/css/geosearch.css' => public_path('filament/assets/css/geosearch.css'),
        ], [
            __DIR__ . '/../dist/js/leaflet.js' => public_path('filament/assets/js/leaflet.js'),
            __DIR__ . '/../dist/js/geosearch.umd.js' => public_path('filament/assets/js/geosearch.umd.js'),
        ])), 'filament-leaflet-geosearch-assets');
    }

}
