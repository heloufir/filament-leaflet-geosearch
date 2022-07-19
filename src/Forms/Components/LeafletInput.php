<?php

namespace Heloufir\FilamentLeafLetGeoSearch\Forms\Components;

use Filament\Forms\Components\Field;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\ViewRecord;

class LeafletInput extends Field
{
    protected string $view = 'filament-leaflet-geosearch::forms.components.leaflet-input';

    protected int $mapHeight = 200;
    protected bool $zoomControl = true;
    protected bool $scrollWheelZoom = true;
    protected int $zoomLevel = 10;

    public function setMapHeight(int $mapHeight): static
    {
        $this->mapHeight = $mapHeight;
        return $this;
    }

    public function getMapHeight(): int
    {
        return $this->mapHeight;
    }

    public function getZoomControl(): string
    {
        return $this->zoomControl ? 'true' : 'false';
    }

    public function setZoomControl(bool $zoomControl): static
    {
        $this->zoomControl = $zoomControl;
        return $this;
    }

    public function getScrollWheelZoom(): string
    {
        return $this->scrollWheelZoom ? 'true' : 'false';
    }

    public function setScrollWheelZoom(bool $scrollWheelZoom): static
    {
        $this->scrollWheelZoom = $scrollWheelZoom;
        return $this;
    }

    public function setZoomLevel(int $zoomLevel): static
    {
        $this->zoomLevel = $zoomLevel;
        return $this;
    }

    public function getZoomLevel(): int
    {
        return $this->zoomLevel;
    }

    public function isViewRecord(): bool {
        return $this->getLivewire() instanceof ViewRecord;
    }
}
