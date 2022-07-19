<?php

namespace Heloufir\FilamentLeafLetGeoSearch\Forms\Components;

use Filament\Forms\Components\Field;

class LeafletInput extends Field
{
    protected string $view = 'filament-leaflet-geosearch::forms.components.leaflet-input';

    protected int $mapHeight = 200;

    public function setMapHeight(int $mapHeight): static
    {
        $this->mapHeight = $mapHeight;

        return $this;
    }

    public function getMapHeight(): int
    {
        return $this->mapHeight;
    }
}
