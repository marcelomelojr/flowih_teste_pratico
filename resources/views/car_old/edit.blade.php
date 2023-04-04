@extends('template', ['title' => 'Editar Carro'])
@section('content')

    <div class="flex flex-col w-6/12 mx-auto items-center">
        <h2 class="flex w-full text-gray-500 self-center my-4 mx-auto text-2xl">Editar informações do carro </h2>
        <form action="{{ route('car.update', ['car' => $car ]) }}" method="post" class="flex flex-col w-full gap-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col w-full gap-y-6 py-2 w-8/12 mx-auto justify-center">

                <input type="text" class="placeholder:text-black rounded" name="name" id="name" placeholder="Nome do Carro" value="{{ old('name', $car->name) }}">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="placeholder:text-black rounded" name="model" id="model" placeholder="Modelo"  value="{{ old('model', $car->model) }}">
                @error('model')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="placeholder:text-black rounded" name="price" id="price" placeholder="Preço"  value="{{ old('price', $car->price) }}">
                @error('price')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="placeholder:text-black rounded" name="color" id="color" placeholder="Cor"  value="{{ old('color', $car->color) }}">
                @error('color')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="placeholder:text-black rounded" name="year" id="year" placeholder="Ano"  value="{{ old('year', $car->year) }}">
                @error('year')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <textarea name="description" class="placeholder:text-black rounded" placeholder="Descrição">{{ old('description', $car->description) }}</textarea>

                <input type="file" name="image[]" id="image" multiple>

                <button class="bg-green-600 text-white px-4 py-2 rounded w-3/12">Cadastrar</button>
            </div>

        </form>
    </div>
@endsection
