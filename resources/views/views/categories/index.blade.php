@extends('layouts.layout')

@section('main')
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection