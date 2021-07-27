<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Forums</title>
</head>
<body>
       	
    <div class="container mx-auto my-5">
        <div class="absolute bg-blue-100 opacity-30 inset-0 z-0"></div>
        <div class="relative bg-white lg:mt-10 lg:flex lg:flex-col md:container md:mx-auto border-2 px-4 py-5 shadow-lg">
            @foreach($categories as $category)
                <h1 class="font-bold text-black-500 text-xl">{{$category->name}}</h1>
                @foreach($category->forums as $forum)
                <h3 class="text-lg text-purple-600 hover:text-purple-900 hover:underline"><a href={{"/forum/$forum->id"}}>{{$forum->name}}</a></h3>
                    <div class="flex flex-row">
                        <p>{{$forum->description}}</p>
                        <small>{{$forum->threads->count()}}</small>

                    </div>
                @endforeach

            @endforeach
        </div>
    </div>
</body>
</html>
