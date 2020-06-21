@extends('layouts.layout')

@section('main')
    <h1>Editar Categoria</h1>
    <form action="{{ route("categories.update", $category->id) }}" method="post">
        @csrf
        @method("PUT")

        <input type="text" name="name" value="{{$category->name}}">
        <br>
        <textarea name="description" cols="30" rows="10">{{$category->description}}</textarea>

        <a href="{{ route("categories.index") }}">Cancelar</a>
        <button id="update-category">Guardar</button>
    </form>
@endsection