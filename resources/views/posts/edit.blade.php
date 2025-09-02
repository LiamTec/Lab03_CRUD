<h1>Editar Post</h1>
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Título</label>
    <input type="text" name="title" value="{{ $post->title }}" required>
    <br>
    <label>Contenido</label>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <br>
    <button type="submit">Actualizar</button>
    <a href="{{ route('posts.index') }}">Volver</a>
</form>
