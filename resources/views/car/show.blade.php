@extends('template', ['title' => $car->name])
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <style>
        .swiper {
            max-width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <div class="flex flex-col min-h-[500px]">
        <div class="swiper mySwiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" class="flex items-center justify-center max-w-2xl">
                <!-- Slides -->

                @foreach($car->images as $image)
                    <div class="swiper-slide"
                         style="background-image: url({{ asset('storage/'.$image->url) }}); background-size: cover; background-position: center">
                        <div class="flex items-end justify-center">
                            <p class="text-white">-</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="flex flex-col w-10/12 mx-auto mt-2">
            <div class="flex justify-end">
                <a href="{{ route('home') }}" class="bg-red-500 text-white cursor-pointer py-2 px-4 rounded">Voltar</a>
            </div>
            <div class="grid grid-cols-2">
                <div>
                    <h1 class="text-2xl text-gray-500">{{ str($car->name)->upper() }}</h1>
                    <h2 class="text-xl text-gray-400">{{ $car->model }}</h2>
                    <div class="flex gap-x-6">
                        <p><i class="ph ph-calendar-blank"></i> {{ $car->year }}</p>
                        <p><i class="ph ph-palette"></i>{{ $car->color }}</p>
                    </div>
                </div>

                <div class="flex flex-col text-gray-500 text-right justify-start items-end my-2">
                    <div class="flex gap-x-2">
                        <p>Anunciante: </p>
                        <i class="ph ph-user"> {{ $car->user->name }}</i>
                    </div>
                    @isset($car->user?->whatsapp)
                        <div class="flex">
                            <p>WhatsApp: {{ $car->user?->whatsapp }}</p>
                        </div>
                    @endisset

                </div>
            </div>

            <p class="text-2xl font-semibold text-gray-800 py-2">R$ {{ $car->price }}</p>
            <p>{{ $car->description}}</p>


        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
