<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h2>{{$post->title}}</h2>
        <h3>{{$post->author}}</h3>
        <p>{{$post->body}}</p>
        <small>{{$post->created_at}}</small>
    </body>
</html>
