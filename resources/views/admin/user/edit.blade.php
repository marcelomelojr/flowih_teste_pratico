<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Usuario - {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.update', ['user' => $user ]) }}" method="post"
                          class="flex flex-col w-full gap-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col w-full gap-y-6 py-2 w-8/12 mx-auto justify-center">

                            <input type="text" class="placeholder:text-black rounded" name="name" id="name"
                                   placeholder="Nome" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" class="placeholder:text-black rounded" name="email" id="email"
                                   placeholder="E-mail" value="{{ old('email', $user->email) }}">
                            @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <input type="text" class="placeholder:text-black rounded" name="whatsapp" id="whatsapp"
                                   placeholder="WhatsApp" value="{{ old('whatsapp', $user->whatsapp) }}">
                            @error('whatsapp')
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <button class="bg-green-600 text-white px-4 py-2 rounded w-3/12">Editar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
