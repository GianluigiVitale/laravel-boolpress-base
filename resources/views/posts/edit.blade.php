<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('posts.update', $post->id)}}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Titolo</label>
                <input type="text" name="title" value="{{$post->title}}">
            </div>
            <div>
                <label for="author">Autore</label>
                <input type="text" name="author" value="{{$post->author}}">
            </div>
            <div>
                <label for="body">Body</label>
                <textarea name="body" rows="8" cols="80">{{$post->body}}</textarea>
            </div>
            <div>
                <label for="summary">Summary</label>
                <input type="text" name="summary" value="{{$post->summary}}">
            </div>
            <div>
                <label for="img">Img</label>
                <input type="text" name="img" value="{{$post->img}}">
            </div>
            <div>
                <label for="not-published">Non Pubblicato</label>
                <input type="radio" id="not-published" name="published" value="0" {{($post->published) == 0 ? 'checked' : ''}}>
                <label for="published">Pubblicato</label>
                <input type="radio" id="published" name="published" value="1" {{($post->published) == 1 ? 'checked' : ''}}>
            </div>
            <div>
                <input type="submit" value="salva">
            </div>
        </form>
    </body>
</html>
