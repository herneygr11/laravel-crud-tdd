@extends('layouts.layout')

@section('main')

<a href="{{ route("categories.create") }}">Crear categoria</a>
<h3>Categorias</h3>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route("categories.edit", $category->id) }}">editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection