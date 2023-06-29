@extends('layouts.app')

@section('content')

    @if ($phone)
        <div class="flex flex-wrap my-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none">
                <div
                    class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                        <div class="flex flex-wrap mt-0 -mx-3">
                            <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                                <h6>Dernière Position</h6>

                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-6 px-0 pb-2">
                        <div class="overflow-x-auto">
                            <div class="px-6 py-4">
                                <button class="manualButton" onclick="manualPrint()">Enregistrer</button>
                                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                    <div id="map" style="height: 500px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let position = @json($location);

            const map = L.map('map').setView([position.latitude, position.longitude], 12);
            map.addControl(new L.Control.Fullscreen({
                title: {
                    'false': 'View Fullscreen',
                    'true': 'Exit Fullscreen'
                }
            }));

            let openstreem = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                tileSize: 512,
                zoomOffset: -1,
                minZoom: 1,
                attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
                crossOrigin: true
            });

            let googleMap = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                subdomains: ['mt1', 'mt2', 'mt3'],
                tileSize: 512,
                zoomOffset: -1,
                maxZoom: 20,
                minZoom: 0,
                crossOrigin: true
            });

            let googleSatellite = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                subdomains: ['mt1', 'mt2', 'mt3'],
                tileSize: 512,
                zoomOffset: -1,
                maxZoom: 20,
                minZoom: 0,
                crossOrigin: true
            });

            const baseMaps = {
                "OpenStreetMap": openstreem,
                "Google maps": googleMap,
                "Google satellite": googleSatellite,
            };

            let layerControl = L.control.layers(baseMaps).addTo(map);
            openstreem.addTo(map);

            console.clear();
            L.marker([position.latitude, position.longitude]).addTo(map)
                .bindPopup(position.latitude + " " + position.longitude + "<br />" + new Date(position.dateTime).toLocaleString('fr-FR'));

            const printer = L.easyPrint({
                tileLayer: openstreem,
                sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
                filename: 'myMap',
                exportOnly: true,
                hideControlContainer: true
            }).addTo(map);

            function manualPrint () {
                printer.printMap('CurrentSize', 'CRTI-MAP')
            }

        </script>
    @else

        <div style="
    height: 80vh;
    display: flex;
    justify-content: center;
    align-content: center;
    align-items: center;">
            Sélectionnez un téléphone
        </div>

    @endif

@endsection
