<a href="{{route('posts.create')}}">Crea post</a>
@foreach ($posts as $post)
    <h2>{{$post->title}}</h2>
    <h3>{{$post->author}}</h3>
    <p>{{$post->body}}</p>
    <small>{{$post->created_at}}</small>
    {{-- <a href="{{route('posts.show', $post->id)}}">Visualizza</a> --}}
    <a href="{{route('posts.edit', $post->id)}}">Modifica</a>
    <form action="{{route('posts.destroy', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Elimina</button>
    </form>
    <hr>
@endforeach
