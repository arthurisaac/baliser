@extends('layouts.app', ["phone" => $phone])

@section('content')

    <div class="w-full px-6 py-6 mx-auto">

        @if ($phone)
            <div class="flex flex-wrap my-6 -mx-3">
                <div class="w-full px-6 py-6 mx-auto">
                    <!-- row 1 -->
                    <div class="flex flex-wrap -mx-3">
                        <!-- card1 -->
                        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-row -mx-3">
                                        <div class="flex-none w-2/3 max-w-full px-3">
                                            <div>
                                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Dernier
                                                    appel</p>
                                                <div class="text-gray-700 text-base">
                                                    <strong>{{ $callLog->number ?? "" }}</strong>
                                                    <p>{{ $callLog->duration ?? "" }} Sec.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-3 text-right basis-1/3">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card2 -->
                        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-2/4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-row -mx-3">
                                        <div class="flex-none w-2/3 max-w-full px-3">
                                            <div>
                                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Dernier
                                                    message</p>
                                                <p class="text-gray-700 text-base">
                                                    {{ $sms->body ?? "" }} <br>
                                                    <small> {{ date("d-m-Y H:i", $sms->date ?? null / 1000) }}</small>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="px-3 text-right basis-1/3">
                                            <div
                                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card3 -->
                        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-row -mx-3">
                                        <div class="flex-none w-2/3 max-w-full px-3">
                                            <div>
                                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total
                                                    notification</p>
                                                <h5 class="mb-0 font-bold">
                                                    {{ $notification->count("*") }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="px-3 text-right basis-1/3">
                                            <div
                                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                                <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="flex flex-wrap my-6 -mx-3">
                <!-- card 1 -->

                <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                            <div class="flex flex-wrap mt-0 -mx-3">
                                <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                                    <h6>Positions</h6>
                                    <p class="mb-0 leading-normal text-sm">
                                        <i class="fa fa-check text-cyan-500"></i>
                                        <span class="ml-1 font-semibold">10</span>
                                        dernières positions
                                    </p>
                                </div>
                                {{-- <div class="flex-none w-5/12 max-w-full px-3 my-auto text-right lg:w-1/2 lg:flex-none">
                                     <div class="relative pr-6 lg:float-right">
                                         <a dropdown-trigger class="cursor-pointer" aria-expanded="false">
                                             <i class="fa fa-ellipsis-v text-slate-400"></i>
                                         </a>
                                         <p class="hidden transform-dropdown-show"></p>

                                         <ul dropdown-menu
                                             class="z-100 text-sm transform-dropdown shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 -ml-34 before:text-5.5 pointer-events-none absolute top-0 m-0 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:top-0 before:right-7 before:left-auto before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
                                             <li class="relative">
                                                 <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300"
                                                    href="javascript:;">Action</a>
                                             </li>
                                             <li class="relative">
                                                 <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300"
                                                    href="javascript:;">Another action</a>
                                             </li>
                                             <li class="relative">
                                                 <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300"
                                                    href="javascript:;">Something else here</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>--}}
                            </div>
                        </div>
                        <div class="flex-auto p-6 px-0 pb-2">
                            <div class="overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            Coordonnées
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Adresses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($locations as $location)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th
                                                class="p-2 text-left bg-transparent border-b whitespace-nowrap">
                                                {{ $location->latitude }}, {{ $location->longitude }}
                                            </th>
                                            <td class="p-2 align-middle bg-transparent border-b">
                                                {{  $location->address ?? "" }}
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b text-center">
                                                {{ $location->dateTime ?? "" }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card 2 -->

                <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                            <h6>Appareil</h6>
                            <p class="leading-normal text-sm">
                                Informations
                            </p>
                        </div>
                        <div class="flex-auto p-4">
                            <div class="font-bold text-xl mb-2"></div>
                            <div class="text-gray-700 text-base">
                                <p><b>Nom : </b>{{ $phone->name }}</p>
                                <br>
                                <p><b>Modèle : </b>{{ $phone->device_model }}</p>
                                <br>
                                <p><b>Dernière connexion : </b>{{ $position->dateTime ?? "" }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap my-6 -mx-3">
                <!-- card 1 -->

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
                let position = @json($position ?? null);
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

                L.marker([position.latitude, position.longitude]).addTo(map)
                    .bindPopup(position.latitude + " " + position.longitude + "<br />" + new Date(position.dateTime).toLocaleString('fr-FR'));

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
