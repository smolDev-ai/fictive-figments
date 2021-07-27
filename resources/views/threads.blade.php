<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $forums->name}}</title>
</head>
<body>
    <hr />
    <h1>{{$forums->name}}</h1>
    @foreach($forums->threads as $thread)
        <div>
            <h4>{{$thread->title}}</h4>
            <p>{{$thread->post_count}}</p>
        </div>
    @endforeach
</body>
</html>
