@extends('layouts.app')

@section('content')

    <div class="w-full px-6 py-6 mx-auto">

        @if ($phone)
            <div class="flex flex-wrap my-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:flex-none lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="flex-auto p-6 px-0 pb-2">
                            <div class="px-6 py-4">
                                <div class="overflow-x-auto">
                                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="table">
                                        <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                Nom
                                            </th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                                Code
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applications as $application)
                                            <tr>
                                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                                    <h6 class="mb-0 leading-normal text-center text-sm">{{ $application->name }}</h6>
                                                </td>
                                                <td class="p-2 align-middle bg-transparent border-b text-sky-600">
                                                    <p class=""> {{ $application->code }}</p>
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
