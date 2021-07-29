@props(['title'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <title>{{$title}}</title>
</head>
    <body class="bg-gray-500">
        <ul class="flex flex-row-revere bg-white py-5">
            @auth
                @if(!request()->is("forum/*"))
                    <li class="mr-6">
                        <a class="text-blue-500 hover:text-blue-800 text-lg" href={{"/thread/create"}}>Create A Thread</a>
                    </li>
                @endif
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800 text-lg" href="#">{{Auth::user()->username}}</a>
                </li>
                <li class="mr-6">
                    <livewire:logout />
                </li>
            @endauth
            @guest
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800 text-lg" href={{"/register"}}>Reigster</a>
                </li>
                <li class="mr-6">
                    <a class="text-blue-500 hover:text-blue-800 text-lg" href={{"/login"}}>Login</a>
                </li>
            @endguest
        </ul>

        {{$slot}}

    
    @livewireScripts
</body>
</html>