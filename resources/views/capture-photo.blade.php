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


                                </div>
                            </div>
                        </div>
                        <div class="flex-auto p-6 px-0 pb-2">
                            <div class="px-6 py-4">
                                <form action="{{ route("capture-photo-command") }}" method="post">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $phone->id }}">
                                    <input type="hidden" name="capturePhoto" value="1">
                                    Arriere <input type="radio" name="capturePhotoPos" value="1" checked>
                                    Avant <input type="radio" name="capturePhotoPos" value="0">

                                    <button> Envoyer</button>
                                </form>
                                <br>
                                <div class="overflow-x-auto">
                                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500"
                                           id="table">
                                        <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                #
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                Date
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                Nom
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($captures as $capture)
                                            <tr>
                                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                    <span
                                                        class="font-semibold leading-tight text-xs"> {{ $capture->id }} </span>
                                                </td>
                                                <td class="p-2 align-middle bg-transparent border-b">
                                                    <h6 class="mb-0 leading-normal font-bold text-xs">{{ $capture->dateTime }}</h6>
                                                </td>
                                                <td
                                                    class="p-2 leading-normal text-left align-middle bg-transparent border-b">
                                                    <span
                                                        class="font-semibold leading-tight text-sm"> {{ $capture->name }} </span>
                                                </td>
                                                <td
                                                    class="p-2 border-b">
                                                    <a href="{{ url('uploads') . "/" . $capture->name }}" target="_blank">
                                                        <img src="{{ url('uploads') . "/" . $capture->name }}" alt=""
                                                             class="object-cover h-48 w-96 rounded border bg-white p-1 dark:border-neutral-700 dark:bg-neutral-800">
                                                    </a>
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
            <script>
                $(document).ready(function () {
                    $('#table').DataTable({
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
