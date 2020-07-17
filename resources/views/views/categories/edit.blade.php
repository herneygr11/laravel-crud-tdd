@extends('layouts.layout')

@section('main')
<div class="mt-5">
    <div class="card w-50 m-auto">
        <div class="card-header">
            <h1>Editar Categoria</h1>
        </div>
        <div class="card-body">
            <form action="{{ route("categories.update", $category->id) }}" method="post">
                @csrf
                @method("PUT")

                <div class="form-group my-2">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    @if ($errors->has("name"))
                    <span class="text-danger">{{ $errors->first("name") }}</span>
                    @endif
                </div>

                <div class="form-group my-2">
                    <label for="description">Descripcion</label>
                    <textarea name="description" cols="30" rows="5"
                        class="form-control">{{$category->description}}</textarea>
                    @if ($errors->has("description"))
                    <span class="text-danger">{{ $errors->first("description") }}</span>
                    @endif
                </div>

                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route("categories.index") }}" class="btn btn-warning text-white mx-1">Cancelar</a>
                    <button id="update-category" class="btn btn-primary mx-1">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection