@php
    $uniqid = uniqid();
@endphp
    <x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="data()">
        <span x-text="label()" class="font-bold text-sm"></span>
        <div id="{{ str_replace('.', '-', $getStatePath()) . '-' . $uniqid }}-map" style="height: {{$getMapHeight()}}px; z-index: 0;" class="w-full rounded-lg shadow-sm" wire:ignore></div>

        @push('scripts')
            @if($isViewRecord())
                <style>
                    .leaflet-control-geosearch {
                        display: none;
                    }
                </style>
            @endif
            <script>
                function data() {
                    return {
                        state: @this.entangle('{{ $getStatePath() }}'),
                        label() {
                            return this.state ? this.state.label : ''
                        },

                        init() {
                            let searchLabel = '{{ __('Search a location') }}';
                            if (this.state) {
                                searchLabel = this.state.label;
                            }

                            const map = L.map('{{ str_replace('.', '-', $getStatePath()) . '-' . $uniqid }}-map', {
                                zoomControl: {{ $getZoomControl() }},
                                scrollWheelZoom: {{ $getScrollWheelZoom() }}
                            }).setView([0, 0], 0);

                            L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

                            let defaultMarker = null;
                            if (this.state) {
                                const obj = (this.state);
                                defaultMarker = L.marker([obj.y, obj.x]).addTo(map);
                                map.setView([obj.y, obj.x], {{ $getZoomLevel() }});
                            }

                            const provider = new GeoSearch.OpenStreetMapProvider();
                            const search = new GeoSearch.GeoSearchControl({
                                provider: provider,
                                style: 'bar',
                                showMarker: true,
                                maxMarker: 1,
                                autoClose: true,
                                autoComplete: true,
                                retainZoomLevel: false,
                                maxSuggestions: 5,
                                keepResult: true,
                                searchLabel: searchLabel,
                                resultFormat: function(t) {
                                    return "" + t.result.label;
                                },
                                marker: {
                                    draggable: false,
                                },
                                updateMap: !0
                            });
                            map.addControl(search);

                            const that = this;

                            map.on('geosearch/showlocation', function(location) {
                                that.state = location.location;
                                if (defaultMarker) {
                                    map.removeLayer(defaultMarker);
                                    defaultMarker = null;
                                }
                            });
                        }
                    };
                }
            </script>
        @endpush
    </div>
</x-forms::field-wrapper>
