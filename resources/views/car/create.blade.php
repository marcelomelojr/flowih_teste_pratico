<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cadastrar Carro
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('car.store') }}" method="post" class="flex flex-col w-full gap-y-6"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col w-full gap-y-6 py-6 w-8/12 mx-auto justify-center">

                            <input type="text" class="placeholder:text-black rounded" name="name" id="name"
                                   placeholder="Nome do Carro" value="{{ old('name') }}">
                            @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" class="placeholder:text-black rounded " name="model"
                                   id="model" placeholder="Modelo" value="{{ old('model') }}">
                            @error('model')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" class="placeholder:text-black rounded " name="price"
                                   id="price" placeholder="Preço" value="{{ old('price') }}">
                            @error('price')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" class="placeholder:text-black rounded " name="color"
                                   id="color" placeholder="Cor" value="{{ old('color') }}">
                            @error('color')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" class="placeholder:text-black rounded " name="year"
                                   id="year" placeholder="Ano" value="{{ old('year') }}">
                            @error('year')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <textarea name="description" class="placeholder:text-black rounded"
                                      placeholder="Descrição">{{ old('description') }}</textarea>

                            <input type="file" name="image[]" id="image" multiple>

                            <button class="bg-green-600 text-white px-4 py-2 rounded w-3/12">Cadastrar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
