@extends('layouts.layout')

@section('main')
<form action="{{ route("categories.save") }}" method="post">
    <h3>Crear Categoria</h3>
    <input type="text" name="name">
    <textarea name="description" cols="30" rows="10"></textarea>
    @csrf
    <button id="create-category">Guardar</button>
</form>
@endsection