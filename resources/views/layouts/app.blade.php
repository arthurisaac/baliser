<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CRTI') }}</title>


    <link href="{{ asset("assets/css/css-family-Open+Sans.css") }}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="{{ asset("assets/js/42d5adcbca.js") }}" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset("assets/css/nucleo-icons.css")}}" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <!-- Popper -->
    {{--<script src="https://unpkg.com/@popperjs/core@2"></script>--}}
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.4')}}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset("assets/css/leaflet.css")}}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/leaflet-routing-machine.css") }}"/>
    <script src="{{ asset("assets/js/leaflet.js") }}"></script>
    <script src="{{ asset("assets/js/leaflet-routing-machine.js") }}"></script>
    <script src="{{ asset("assets/js/Leaflet.fullscreen.min.js") }}"></script>
    <link href='{{ asset("assets/css/leaflet.fullscreen.css") }}'
          rel='stylesheet'/>
    <link href="{{ asset("assets/css/soft-ui-dashboard-tailwind.css?v=1.0.4")}}" rel="stylesheet"/>

   {{-- DataTable--}}
    <script src="{{ asset("assets/js/jquery-3.5.1.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("assets/js/jszip.min.js") }}"></script>
    <script src="{{ asset("assets/js/pdfmake.min.js") }}"></script>
    <script src="{{ asset("assets/js/vfs_fonts.js") }}"></script>
    <script src="{{ asset("assets/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("assets/js/easyPrint.js") }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/jquery.dataTables.css") }}">

    @vite('resources/css/app.css')
    <style>
        #map {
            height: 50vh;
            width: 100%;
        }
    </style>
</head>


<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

    <aside
        class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
        <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
               sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
                <img src="{{ asset("assets/img/logo-ct.png")}}"
                     class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo"/>
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">CRTI</span>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent"/>

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "dashboard") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("dashboard", ['id' => $phone->id]) }}" @else href="{{ route("dashboard") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "dashboard") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="14px" height="14px" viewBox="0 0 45 40" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="opacity-60"
                                                      d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class=""
                                                      d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Tableau de bord</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "locations") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("locations", ['id' => $phone->id]) }}" @else href="{{ route("locations") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "locations") bg-gradient-to-tl from-purple-700 to-pink-500 @endif  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M19.8796 20.9401C18.9296 21.6401 17.6796 22.0001 16.1896 22.0001H7.8096C7.5696 22.0001 7.32961 21.9901 7.09961 21.9601L13.9996 15.0601L19.8796 20.9401Z" fill="#292D32"/>
                                <path opacity="0.4" d="M22.0005 7.8101V16.1901C22.0005 17.6801 21.6406 18.9301 20.9406 19.8801L15.0605 14.0001L21.9605 7.1001C21.9905 7.3301 22.0005 7.5701 22.0005 7.8101Z" fill="#292D32"/>
                                <path opacity="0.4" d="M15.06 14L20.94 19.88C20.65 20.3 20.3 20.65 19.88 20.94L14 15.06L7.10001 21.96C6.46001 21.92 5.88001 21.79 5.35001 21.59C3.21001 20.81 2 18.91 2 16.19V7.81C2 4.17 4.17 2 7.81 2H16.19C18.91 2 20.81 3.21 21.59 5.35C21.79 5.88 21.92 6.46 21.96 7.1L15.06 14Z" fill="#292D32"/>
                                <path d="M15.0596 14.0001L20.9396 19.8801C20.6496 20.3001 20.2996 20.6501 19.8796 20.9401L13.9996 15.0601L7.09961 21.9601C6.45961 21.9201 5.87961 21.7901 5.34961 21.5901L5.73959 21.2001L21.5896 5.3501C21.7896 5.8801 21.9196 6.4601 21.9596 7.1001L15.0596 14.0001Z" fill="#292D32"/>
                                <path d="M12.2408 7.92979C11.8608 6.27979 10.4008 5.53979 9.12078 5.52979C7.84078 5.52979 6.38079 6.26978 6.00079 7.91978C5.58079 9.74978 6.70078 11.2798 7.71078 12.2398C8.11078 12.6198 8.61078 12.7998 9.12078 12.7998C9.63078 12.7998 10.1308 12.6098 10.5308 12.2398C11.5408 11.2798 12.6608 9.74979 12.2408 7.92979ZM9.15078 9.48978C8.60078 9.48978 8.15078 9.03978 8.15078 8.48978C8.15078 7.93978 8.59078 7.48978 9.15078 7.48978H9.16079C9.71079 7.48978 10.1608 7.93978 10.1608 8.48978C10.1608 9.03978 9.70078 9.48978 9.15078 9.48978Z" fill="#292D32"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Emplacements GPS</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "location") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("location", ['id' => $phone->id]) }}" @else href="{{ route("location") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "location") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3856 23.789L11.3831 23.7871L11.3769 23.7822L11.355 23.765C11.3362 23.7501 11.3091 23.7287 11.2742 23.7008C11.2046 23.6451 11.1039 23.5637 10.9767 23.4587C10.7224 23.2488 10.3615 22.944 9.92939 22.5599C9.06662 21.793 7.91329 20.7041 6.75671 19.419C5.60303 18.1371 4.42693 16.639 3.53467 15.0528C2.64762 13.4758 2 11.7393 2 10C2 7.34784 3.05357 4.8043 4.92893 2.92893C6.8043 1.05357 9.34784 0 12 0C14.6522 0 17.1957 1.05357 19.0711 2.92893C20.9464 4.8043 22 7.34784 22 10C22 11.7393 21.3524 13.4758 20.4653 15.0528C19.5731 16.639 18.397 18.1371 17.2433 19.419C16.0867 20.7041 14.9334 21.793 14.0706 22.5599C13.6385 22.944 13.2776 23.2488 13.0233 23.4587C12.8961 23.5637 12.7954 23.6451 12.7258 23.7008C12.6909 23.7287 12.6638 23.7501 12.645 23.765L12.6231 23.7822L12.6169 23.7871L12.615 23.7885C12.615 23.7885 12.6139 23.7894 12 23L12.6139 23.7894C12.2528 24.0702 11.7467 24.0699 11.3856 23.789ZM12 23L11.3856 23.789C11.3856 23.789 11.3861 23.7894 12 23ZM15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10Z" fill="#000000"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Localisation GPS</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "smses") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("smses", ['id' => $phone->id]) }}" @else href="{{ route("smses") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "smses") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="80px" height="80px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5H7" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 16.5H8" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12.5H5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">SMS</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "call-log") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("call-log", ['id' => $phone->id]) }}" @else href="{{ route("call-log") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "call-log") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>call log</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="fill-slate-800 opacity-60"
                                                      d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="fill-slate-800"
                                                      d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Journal d'appels</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "contacts") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("contacts", ['id' => $phone->id]) }}" @else href="{{ route("contacts") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "caontacts") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"
                                 width="800px" height="800px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve">
                                <g>
                                    <path d="M43,2H13.5c-2.6,0-4.8,2.4-4.8,4.8v1.6H7.1C5.4,8.4,4,9.8,4,11.6s1.4,3.2,3.1,3.2h1.6v8H7.1
                                        C5.4,22.8,4,24.2,4,26s1.4,3.2,3.1,3.2h1.6v8H7.1c-1.7,0-3.1,1.4-3.1,3.2c0,1.8,1.4,3.2,3.1,3.2h1.6v1.6c0,2.4,2.2,4.8,4.8,4.8H43
                                        c2.6,0,5-2.4,5-5V6.6C48,3.9,45.6,2,43,2z M40.2,34.2L38,36.5c-0.5,0.5-1.2,0.8-1.8,0.7C31,36.9,26.2,34.5,22.7,31
                                        c-3.5-3.5-5.8-8.5-6.1-13.8c0-0.7,0.2-1.4,0.7-1.8l2.2-2.2c1-1,2.7-1,3.6,0.2l2,2.6c0.7,0.9,0.7,2.1,0.1,3l-1.7,2.5
                                        c-0.2,0.3-0.2,0.8,0.1,1l3.6,4.1l4,3.7c0.3,0.3,0.7,0.3,1,0.1l2.4-1.8c0.9-0.6,2.1-0.6,3,0.1l2.5,2.1
                                        C41.2,31.4,41.2,33.2,40.2,34.2z"/>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Contacts</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "keyloggers") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("keyloggers", ['id' => $phone->id]) }}" @else href="{{ route("keyloggers") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "keyloggers") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="14px" height="14px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10L22 9.93418C22.0001 9.04769 22.0001 8.28387 21.9179 7.67221C21.8297 7.0167 21.631 6.38835 21.1213 5.87869C20.6117 5.36902 19.9833 5.17028 19.3278 5.08215C18.7161 4.99991 17.9523 4.99995 17.0658 5L17 5.00001L6.93418 5C6.04769 4.99995 5.28388 4.99991 4.67222 5.08215C4.0167 5.17028 3.38835 5.36902 2.87869 5.87868C2.36902 6.38835 2.17028 7.0167 2.08215 7.67221C1.99991 8.28387 1.99995 9.04769 2 9.93418V9.9342V14.0658V14.0658C1.99995 14.9523 1.99991 15.7161 2.08215 16.3278C2.17028 16.9833 2.36902 17.6117 2.87869 18.1213C3.38835 18.631 4.0167 18.8297 4.67222 18.9179C5.28388 19.0001 6.04769 19.0001 6.93418 19H17.0658C17.9523 19.0001 18.7161 19.0001 19.3278 18.9179C19.9833 18.8297 20.6117 18.631 21.1213 18.1213C21.631 17.6117 21.8297 16.9833 21.9179 16.3278C22.0001 15.7161 22.0001 14.9523 22 14.0658L22 10ZM14 15C14.5523 15 15 14.5523 15 14C15 13.4477 14.5523 13 14 13H10C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15H14ZM17.5 9C18.0523 9 18.5 9.44772 18.5 10V10.01C18.5 10.5623 18.0523 11.01 17.5 11.01C16.9477 11.01 16.5 10.5623 16.5 10.01V10C16.5 9.44772 16.9477 9 17.5 9ZM15 9.99C15 9.43772 14.5523 8.99 14 8.99C13.4477 8.99 13 9.43772 13 9.99V10C13 10.5523 13.4477 11 14 11C14.5523 11 15 10.5523 15 10V9.99ZM17.5 12.99C18.0523 12.99 18.5 13.4377 18.5 13.99V14C18.5 14.5523 18.0523 15 17.5 15C16.9477 15 16.5 14.5523 16.5 14V13.99C16.5 13.4377 16.9477 12.99 17.5 12.99ZM7.5 14C7.5 13.4477 7.05229 13 6.5 13C5.94772 13 5.5 13.4477 5.5 14V14.01C5.5 14.5623 5.94772 15.01 6.5 15.01C7.05229 15.01 7.5 14.5623 7.5 14.01V14ZM10 9C10.5523 9 11 9.44772 11 10V10.01C11 10.5623 10.5523 11.01 10 11.01C9.44772 11.01 9 10.5623 9 10.01V10C9 9.44772 9.44772 9 10 9ZM7.5 10C7.5 9.44772 7.05229 9 6.5 9C5.94772 9 5.5 9.44772 5.5 10V10.01C5.5 10.5623 5.94772 11.01 6.5 11.01C7.05229 11.01 7.5 10.5623 7.5 10.01V10Z" fill="#323232"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">KeyLogger</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "notifications") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("notifications", ['id' => $phone->id]) }}" @else href="{{ route("notifications") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "notifications") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M19 8C20.6569 8 22 6.65685 22 5C22 3.34315 20.6569 2 19 2C17.3431 2 16 3.34315 16 5C16 6.65685 17.3431 8 19 8Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path opacity="0.4" d="M7 13H12" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path opacity="0.4" d="M7 17H16" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V10" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Notifications</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "capture-audio") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("capture-audio", ['id' => $phone->id]) }}" @else href="{{ route("capture-audio") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "capture-audio") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.66984 13.9219C8.92984 13.9219 8.33984 14.5219 8.33984 15.2619C8.33984 16.0019 8.93984 16.5919 9.66984 16.5919C10.4098 16.5919 11.0098 15.9919 11.0098 15.2619C11.0098 14.5219 10.4098 13.9219 9.66984 13.9219Z" fill="#292D32"/>
                                <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM17.12 9.8C17.12 10.41 16.86 10.95 16.42 11.27C16.14 11.47 15.8 11.58 15.44 11.58C15.23 11.58 15.02 11.54 14.8 11.47L12.51 10.71C12.5 10.71 12.48 10.7 12.47 10.69V15.25C12.47 16.79 11.21 18.05 9.67 18.05C8.13 18.05 6.87 16.79 6.87 15.25C6.87 13.71 8.13 12.45 9.67 12.45C10.16 12.45 10.61 12.59 11.01 12.8V8.63V8.02C11.01 7.41 11.27 6.87 11.71 6.55C12.16 6.23 12.75 6.15 13.33 6.35L15.62 7.11C16.48 7.4 17.13 8.3 17.13 9.2V9.8H17.12Z" fill="#292D32"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Capture audio</span>
                    </a>
                </li>

                {{--<li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "applications") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("applications", ['id' => $phone->id]) }}" @else href="{{ route("applications") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "applications") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.66984 13.9219C8.92984 13.9219 8.33984 14.5219 8.33984 15.2619C8.33984 16.0019 8.93984 16.5919 9.66984 16.5919C10.4098 16.5919 11.0098 15.9919 11.0098 15.2619C11.0098 14.5219 10.4098 13.9219 9.66984 13.9219Z" fill="#292D32"/>
                                <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM17.12 9.8C17.12 10.41 16.86 10.95 16.42 11.27C16.14 11.47 15.8 11.58 15.44 11.58C15.23 11.58 15.02 11.54 14.8 11.47L12.51 10.71C12.5 10.71 12.48 10.7 12.47 10.69V15.25C12.47 16.79 11.21 18.05 9.67 18.05C8.13 18.05 6.87 16.79 6.87 15.25C6.87 13.71 8.13 12.45 9.67 12.45C10.16 12.45 10.61 12.59 11.01 12.8V8.63V8.02C11.01 7.41 11.27 6.87 11.71 6.55C12.16 6.23 12.75 6.15 13.33 6.35L15.62 7.11C16.48 7.4 17.13 8.3 17.13 9.2V9.8H17.12Z" fill="#292D32"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Applications</span>
                    </a>
                </li>--}}

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "capture-photo") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("capture-photo", ['id' => $phone->id]) }}" @else href="{{ route("capture-photo") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "capture-photo") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 9C3 7.89543 3.89543 7 5 7H6.5C7.12951 7 7.72229 6.70361 8.1 6.2L9.15 4.8C9.52771 4.29639 10.1205 4 10.75 4H13.25C13.8795 4 14.4723 4.29639 14.85 4.8L15.9 6.2C16.2777 6.70361 16.8705 7 17.5 7H19C20.1046 7 21 7.89543 21 9V18C21 19.1046 20.1046 20 19 20H5C3.89543 20 3 19.1046 3 18V9Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="13" r="4" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Capture photo</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("call-records", ['id' => $phone->id]) }}" @else href="{{ route("call-records") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "call-records") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">

                                <defs>

                                    <style>.cls-1{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style>

                                </defs>

                                <title/>

                                <g data-name="Layer 23" id="Layer_23">

                                    <rect class="cls-1" height="35.28" rx="5.79" ry="5.79" width="15.25" x="24.28" y="1.79"/>

                                    <path class="cls-1" d="M13.07,26.62a18.93,18.93,0,0,0,37.86,0l-5,.28a13.9,13.9,0,0,1-27.8,0Z"/>

                                    <line class="cls-1" x1="32" x2="32" y1="45.55" y2="62.67"/>

                                    <line class="cls-1" x1="22.87" x2="40.85" y1="62.67" y2="62.67"/>

                                    <line class="cls-1" x1="24.28" x2="28.42" y1="16.17" y2="16.17"/>

                                    <line class="cls-1" x1="24.28" x2="28.42" y1="23.17" y2="23.17"/>

                                    <line class="cls-1" x1="24.28" x2="28.42" y1="30.17" y2="30.17"/>

                                    <line class="cls-1" x1="35.28" x2="39.42" y1="16.17" y2="16.17"/>

                                    <line class="cls-1" x1="35.28" x2="39.42" y1="23.17" y2="23.17"/>

                                    <line class="cls-1" x1="35.28" x2="39.42" y1="30.17" y2="30.17"/>

                                    <line class="cls-1" x1="29.42" x2="29.42" y1="2.79" y2="7.92"/>

                                    <line class="cls-1" x1="34.42" x2="34.42" y1="2.79" y2="7.92"/>

                                </g>

                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Enregistrement d'appels</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "galleries") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("galleries", ['id' => $phone->id]) }}" @else href="{{ route("galleries") }}" @endif>
                        <div class="@if (Route::currentRouteName() == "galleries") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg fill="#000000" version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="800px" height="800px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                <g>
                                    <path d="M62,6H10C8.896,6,8,6.896,8,8v6H2c-1.104,0-2,0.896-2,2v40c0,1.104,0.896,2,2,2h52c1.104,0,2-0.896,2-2v-6h6
                                        c1.104,0,2-0.896,2-2V8C64,6.896,63.104,6,62,6z M52,18v31.651l-10.698-9.17c-0.656-0.561-1.595-0.639-2.331-0.196l-8.566,5.14
                                        L17.505,30.683c-0.364-0.416-0.885-0.663-1.438-0.682c-0.551-0.015-1.089,0.193-1.48,0.585L4,41.172V18H52z M4,46.828
                                        l11.902-11.902l12.593,14.392c0.639,0.729,1.705,0.897,2.534,0.397l8.764-5.258L50.927,54H4V46.828z M60,46h-4V16
                                        c0-1.104-0.896-2-2-2H12v-4h48V46z"/>
                                    <path d="M41,36c3.859,0,7-3.141,7-7s-3.141-7-7-7s-7,3.141-7,7S37.141,36,41,36z M41,26c1.654,0,3,1.346,3,3s-1.346,3-3,3
                                        s-3-1.346-3-3S39.346,26,41,26z"/>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Galerie</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="@if (Route::currentRouteName() == "whatsapp-audio") shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700 @endif py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                       @if ($phone) href="{{ route("whatsapp-audio", ['id' => $phone->id]) }}" @else href="{{ route("whatsapp-audio") }}" @endif>
                        <div
                            class="@if (Route::currentRouteName() == "whatsapp-audio") bg-gradient-to-tl from-purple-700 to-pink-500 @endif shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.66984 13.9219C8.92984 13.9219 8.33984 14.5219 8.33984 15.2619C8.33984 16.0019 8.93984 16.5919 9.66984 16.5919C10.4098 16.5919 11.0098 15.9919 11.0098 15.2619C11.0098 14.5219 10.4098 13.9219 9.66984 13.9219Z" fill="#292D32"/>
                                <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM17.12 9.8C17.12 10.41 16.86 10.95 16.42 11.27C16.14 11.47 15.8 11.58 15.44 11.58C15.23 11.58 15.02 11.54 14.8 11.47L12.51 10.71C12.5 10.71 12.48 10.7 12.47 10.69V15.25C12.47 16.79 11.21 18.05 9.67 18.05C8.13 18.05 6.87 16.79 6.87 15.25C6.87 13.71 8.13 12.45 9.67 12.45C10.16 12.45 10.61 12.59 11.01 12.8V8.63V8.02C11.01 7.41 11.27 6.87 11.71 6.55C12.16 6.23 12.75 6.15 13.33 6.35L15.62 7.11C16.48 7.4 17.13 8.3 17.13 9.2V9.8H17.12Z" fill="#292D32"/>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">WhatsApp Audios</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('layouts.navbar', ['phones' => $phones])

        @yield('content')
    </main>
</body>
<!-- plugin for charts  -->
<script src="{{ asset("assets/js/plugins/chartjs.min.js")}}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset("assets/js/plugins/perfect-scrollbar.min.js")}}" async></script>
<!-- github button -->
<script async defer src="{{ asset("assets/js/buttons.js") }}"></script>
<!-- main script file  -->
<script src="{{ asset("assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4")}}" async></script>

</html>
