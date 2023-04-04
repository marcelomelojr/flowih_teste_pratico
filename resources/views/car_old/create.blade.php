@extends('template', ['title' => 'Cadastro de Carros'])
@section('content')
    <div class="flex w-6/12 mx-auto items-center">
        <form action="{{ route('car.store') }}" method="post" class="flex flex-col w-full gap-y-6" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col w-full gap-y-6 py-6 w-8/12 mx-auto justify-center">

                <input type="text" class="placeholder:text-black rounded" name="name" id="name" placeholder="Nome do Carro" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="bg-gray-100 placeholder:text-black border-b-2" name="model" id="model" placeholder="Modelo"  value="{{ old('model') }}">
                @error('model')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="bg-gray-100 placeholder:text-black border-b-2" name="price" id="price" placeholder="Preço"  value="{{ old('price') }}">
                @error('price')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="bg-gray-100 placeholder:text-black border-b-2" name="color" id="color" placeholder="Cor"  value="{{ old('color') }}">
                @error('color')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="text" class="bg-gray-100 placeholder:text-black border-b-2" name="year" id="year" placeholder="Ano"  value="{{ old('year') }}">
                @error('year')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <textarea name="description" class="bg-gray-100 placeholder:text-black border-b-2" placeholder="Descrição">{{ old('description') }}</textarea>

                <input type="file" name="image[]" id="image" multiple>

                <button class="bg-green-600 text-white px-4 py-2 rounded w-3/12">Cadastrar</button>
            </div>

        </form>
    </div>
@endsection
