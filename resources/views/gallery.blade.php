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
                                <div class="overflow-x-auto">
                                    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                                        <a href="{{ route("galleries", ['id' => $phone->id, 'filter' => 'none']) }}" type="button" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">Tout</a>
                                        <a href="{{ route("galleries", ['id' => $phone->id, 'filter' => 'videos']) }}" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">Vidéos</a>
                                        <a href="{{ route("galleries", ['id' => $phone->id, 'filter' => 'photos']) }}" type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">Photos</a>
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach($captures as $capture)
                                            @if ($capture->mime == "video/mp4")
                                                <video width="320" height="240" controls>
                                                    <source src="{{  url('uploads') . "/" . $capture->name  }}" type="{{ $capture->mime }}"> <source src="/build/videos/arcnet.io(7-sec).mp4" type=video/mp4>
                                                </video>
                                            @else
                                                <figure class="max-w-lg">
                                                    <img class="h-auto max-w-full rounded-lg"
                                                         src="{{ url('uploads') . "/" . $capture->name }}" alt="">
                                                    <figcaption
                                                        class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{ $capture->created_at }}</figcaption>
                                                </figure>
                                            @endif
                                        @endforeach
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
