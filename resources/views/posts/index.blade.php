@extends('layouts.app')
@section('content')
<h1>Posts</h1>
<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Nuevo Post</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
        <td>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
