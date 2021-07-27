<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$forums->category->name }} :: {{ $forums->name}}</title>
</head>
<body>
    <h1>{{$forums->Category->name}}</h1>
    <hr />
    <h2>{{$forums->name}}</h2>
    @foreach($forums->threads as $thread)
        <div>
            <h4>{{$thread->title}}</h4>
            <p>{{$thread->posts->count()}}</p>
        </div>
    @endforeach
</body>
</html>
