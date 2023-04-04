@extends('template', ['title' => 'Home'])

@section('content')

    <div class="grid grid-cols-4 gap-4 mx-auto w-10/12">
        @forelse($cars as $car)
            <a href="{{ route('car.show', ['car' => $car->id]) }}">
                <div class="border border-solid w-full max-w-[300px] py-4">
                    <img style="width: 300px; height: 200px" src="{{ $car->image }}" title="{{ $car->name }}">
                    <div class="flex flex-col items-start py-1 px-2">
                        <h3 class="text-bold text-xl text-gray-800">
                            {{ str($car->name)->upper() }}
                        </h3>
                        <h4 class="text-bold text-gray-500">
                            {{ str($car->model)->upper() }}
                        </h4>

                        <p class="text-xl font-semibold text-gray-800 py-2">R$ {{ $car->price }}</p>
                        <hr class="w-full">
                        <div class="flex w-full justify-between py-2 text-gray-500">
                            <p>
                                <i class="ph ph-calendar-blank"></i> {{ $car->year }}
                            </p>
                            <p>
                                <i class="ph ph-palette"></i> {{ $car->color }}
                            </p>
                        </div>
                    </div>

                </div>
            </a>
        @empty
        @endforelse
    </div>
    <div class="grid gap-4 mx-auto w-10/12 mt-4">
        {{ $cars->links() }}
    </div>
@endsection
