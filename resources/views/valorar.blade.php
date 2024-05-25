<x-layout>

    <x-header />
    <p>{{ $id }}</p>
    <form action="/valorar" method="get">
        
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <label for="calificacion">Estrellas:</label><br>
        <input type="number" name="calificacion" id="calificacion"><br>

        <label for="comentario">Comentario:</label><br>
        <textarea name="comentario" id="comentario" cols="60" rows="10"></textarea><br>

        <input type="submit" name="valorar" value="valorar">

    </form>
</x-layout>
