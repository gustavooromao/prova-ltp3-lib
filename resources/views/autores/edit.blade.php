@extends('layouts.app')

@section('title', 'Editar autor')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Editar autor</h1>
    </div>

    <form action="{{ route('autores.update', $autor) }}" method="POST" class="max-w-xl space-y-4 rounded bg-white p-6 shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="nome" class="mb-1 block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $autor->nome) }}"
                   class="w-full rounded border px-3 py-2">
            @error('nome')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nacionalidade" class="mb-1 block text-sm font-medium text-gray-700">Nacionalidade</label>
            <input type="text" name="nacionalidade" id="nacionalidade"
                   value="{{ old('nacionalidade', $autor->nacionalidade) }}"
                   class="w-full rounded border px-3 py-2">
            @error('nacionalidade')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                Salvar
            </button>
            <a href="{{ route('autores.index') }}" class="rounded border px-4 py-2 text-gray-700 hover:bg-gray-50">
                Voltar
            </a>
        </div>
    </form>
@endsection
