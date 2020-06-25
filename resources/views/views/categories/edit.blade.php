@extends('layouts.layout')

@section('main')
    <h1>Editar Categoria</h1>
    <form action="{{ route("categories.update", $category->id) }}" method="post">
        @csrf
        @method("PUT")

        <input type="text" name="name" value="{{$category->name}}">
        @if ($errors->has("name"))
            <span>{{ $errors->first("name") }}</span>
        @endif
        <br>
        <textarea name="description" cols="30" rows="10">{{$category->description}}</textarea>
        @if ($errors->has("description"))
            <span>{{ $errors->first("description") }}</span>
        @endif

        <a href="{{ route("categories.index") }}">Cancelar</a>
        <button id="update-category">Guardar</button>
    </form>
@endsection