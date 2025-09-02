<h1>Crear Post</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Título</label>
    <input type="text" name="title" required>
    <br>
    <label>Contenido</label>
    <textarea name="content" required></textarea>
    <br>
    <button type="submit">Guardar</button>
    <a href="{{ route('posts.index') }}">Volver</a>
</form>
