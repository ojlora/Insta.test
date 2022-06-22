@extends('layouts.app')
@section('titulo')
Crea una nueva publicacion
@endsection

@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush


@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
            class="dropzone border-dashed borde-2 w-full h-96 rounded flex flex-column justify-center items-center"
            id="dropzone">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 bg-white px-10 py-10 rounded-lg shadow-xl ml-10">
        <form action="{{ route('register') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="titulo" id="titulo" class="mb-2 block uppercase text-gray-500 font-bold"> Titulo </label>
                <input id="titulo" type="text" name="titulo" placeholder="Titulo de la Publicación"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{ old('titulo')
                    }}>
                @error('titulo')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" id="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                    Descripción </label>
                <textarea id="descripcion" name="descripcion" placeholder="Descripcion de la Publicación"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"></textarea>
                @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Crear Cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

        </form>
    </div>
</div>
@endsection