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
    <script src="{{asset('js/app.js')}}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <title>{{$title}}</title>
</head>
    <body class="bg-gray-500">
        <ul class="flex flex-row-reverse bg-white py-5">
            @auth
                @if(request()->is("forum"))
                    <li class="mr-6">
                        <a class="text-blue-500 hover:text-blue-800 text-lg" href={{"/thread/create"}}>Create A Thread</a>
                    </li>
                @elseif(request()->is("admin") || request()->is("admin/*"))
                    <li class="mr-6">
                        <a class="text-blue-500 hover:text-blue-800 text-lg" href={{"/admin/create/category"}}>Create A Category</a>
                    </li>  
                    <li class="mr-6">
                        <a class="text-blue-500 hover:text-blue-800 text-lg" href={{"/admin/create/forum"}}>Create A Forum</a>
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

        <script src="{{asset('node_modules/tinymce/tinymce.js')}}"></script>
        @livewireScripts
        <script>
            tinymce.init({
                selector: "textarea#body",
                height: 500,
                plugins: 'emoticons image imagetools media charmap lists advlist bbcode code codesample wordcount autolink link autosave spellchecker',
                toolbar: 'undo redo | styleselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist | media image charmap emoticons codesample | outdent indent | restoredraft code spellchecker',
            });
    </script>
</body>
</html>