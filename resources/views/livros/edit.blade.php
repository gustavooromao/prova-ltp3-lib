@extends('layouts.app')

@section('title', 'Editar livro')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Editar livro</h1>
    </div>

    <form action="{{ route('livros.update', $livro) }}" method="POST" class="max-w-xl space-y-4 rounded bg-white p-6 shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo" class="mb-1 block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $livro->titulo) }}"
                   class="w-full rounded border px-3 py-2">
            @error('titulo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="ano_publicacao" class="mb-1 block text-sm font-medium text-gray-700">Ano de publicação</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao"
                   value="{{ old('ano_publicacao', $livro->ano_publicacao) }}"
                   class="w-full rounded border px-3 py-2">
            @error('ano_publicacao')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="isbn" class="mb-1 block text-sm font-medium text-gray-700">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $livro->isbn) }}"
                   class="w-full rounded border px-3 py-2">
            @error('isbn')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="autor_id" class="mb-1 block text-sm font-medium text-gray-700">Autor</label>
            <select name="autor_id" id="autor_id" class="w-full rounded border px-3 py-2">
                <option value="">Selecione um autor</option>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}" {{ old('autor_id', $livro->autor_id) == $autor->id ? 'selected' : '' }}>
                        {{ $autor->nome }}
                    </option>
                @endforeach
            </select>
            @error('autor_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                Salvar
            </button>
            <a href="{{ route('livros.index') }}" class="rounded border px-4 py-2 text-gray-700 hover:bg-gray-50">
                Voltar
            </a>
        </div>
    </form>
@endsection
