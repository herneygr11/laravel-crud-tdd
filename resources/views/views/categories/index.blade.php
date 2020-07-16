@extends('layouts.layout')

@section('main')

<div class="d-flex align-items-center justify-content-between my-5">
    <h3>Categorias</h3>
    <a href="{{ route("categories.create") }}" class="btn btn-primary">Crear categoria</a>
</div>

<table class="table table-active table-hover w-50 m-auto">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Description</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td class="d-flex align-content-center">
                <a href="{{ route("categories.edit", $category->id) }}" class="btn btn-primary mx-1">editar</a>
                <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button id="delete-category" class="btn btn-danger mx-1">eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection