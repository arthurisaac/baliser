@extends('layouts.app')

@section('content')

    <div class="w-full px-6 py-6 mx-auto">
        @if ($phone)
            <div class="flex flex-wrap my-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                            <div class="flex flex-wrap mt-0 -mx-3">
                                <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                                    <h6>Positions</h6>

                                </div>
                            </div>
                        </div>
                        <div class="flex-auto p-6 px-0 pb-2">
                            <div class="overflow-x-auto">
                                <div class="px-6 py-4">
                                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                        <div id="map" style="height: 500px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none mt-5">
                    <div
                        class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="flex-auto p-6 px-0 pb-2">
                            <div class="px-6 py-4">
                                <div class="overflow-x-auto">
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                                               id="table">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    #
                                                </th>
						<th scope="col" class="px-6 py-3">
                                                    Latitude
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Longitude
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date
                                                </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($locations as $position)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
						    <th
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                        {{ $position->id }}
                                                    </th>
                                                    <th
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                        {{ $position->latitude }}
                                                    </th>
                                                    <th
                                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                        {{ $position->longitude }}
                                                    </th>
                                                    <td class="p-2 align-middle bg-transparent border-b text-right">
                                                        {{ $position->dateTime }}
                                                    </td>
                                                    <td class="p-2 align-middle bg-transparent border-b text-right">
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{ $position->latitude }},{{ $position->longitude }}" target="_blank">Voir</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                let position = @json($location);
                let locations = @json($locations);
                let positions = locations.map(position => {
                    return L.latLng(position.latitude, position.longitude)
                })

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

                L.Routing.control({
                    createMarker: function (i, wp, nWps) {
                        return L.marker(wp.latLng)
                            .bindPopup(locations[i].latitude + " " + locations[i].longitude + "<br />" + new Date(locations[i].dateTime).toLocaleString('fr-FR'));
                    },
                    waypoints: positions,
                }).addTo(map);

                const printer = L.easyPrint({
                    tileLayer: openstreem,
                    sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
                    filename: 'myMap',
                    exportOnly: true,
                    hideControlContainer: true
                }).addTo(map);

                console.clear();
                /*L.marker([position.latitude, position.longitude]).addTo(map)
                    .bindPopup(position.latitude + " " + position.longitude + "<br />" + new Date(position.dateTime).toLocaleString('fr-FR'));*/

                const elements = document.getElementsByClassName("leaflet-routing-container");
                elements[0].classList.add("hidden")

            </script>
            <script>
                $(document).ready(function () {
                    $('#table').DataTable({
			order: [[3, 'desc']],
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5'
                        ],
                        language: {
                            url: '{{ asset("assets/datatable-fr-FR.json") }}',
                        },
                    });
                });
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

    </div>

@endsection
