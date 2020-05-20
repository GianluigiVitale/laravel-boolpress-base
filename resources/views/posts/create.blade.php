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
        <form class="" action="{{route('posts.store')}}" method="post">
            @csrf
            @method('POST')
            <div>
                <label for="title">Titolo</label>
                <input type="text" name="title" value="Inserisci titolo">
            </div>
            <div>
                <label for="author">Autore</label>
                <input type="text" name="author" value="Inserisci autore">
            </div>
            <div>
                <label for="body">Body</label>
                <textarea name="body" rows="8" cols="80">Body</textarea>
            </div>
            <div>
                <label for="summary">Summary</label>
                <input type="text" name="summary" value="Summary">
            </div>
            <div>
                <label for="img">Img</label>
                <input type="text" name="img" value="Img">
            </div>
            <div>
                <label for="not-published">Non Pubblicato</label>
                <input type="radio" id="not-published" name="published" value="0">
                <label for="published">Pubblicato</label>
                <input type="radio" id="published" name="published" value="1">
            </div>
            <div>
                <input type="submit" value="salva">
            </div>
        </form>
    </body>
</html>
