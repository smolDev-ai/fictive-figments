<x-layout title="Admin Panel :: Create Forum">

    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 w-11/12 max-w-xl sm:mx-auto">
            <div class="relative p-8 bg-white shadow-sm sm:rounded-xl">
                @auth
                
                    <form method="POST" action="/admin/forum">
                    @csrf
                    <div class="mb-5 relative">
                        <input type="name" name="name" id="name" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" placeholder="shadowrunner245" autocomplete="off" />
                        <label for="name" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Name</label>
                            
                    </div>
                        <div class="mb-5 relative">
                            <select name="category" id="category">
                                @foreach($categories as $category)
                                    <option value={{$category->id}}>{{$category->name}}</option>
                                @endforeach
                        </select>
                        </div>
                    <div class="mb-5 relative">
                        <textarea class="w-full" name="description" id="description" rows="10" placeholder="description"></textarea>
                    </div>
                    <div class="mb-5 relative">
                        <input type="checkbox" name="is_subForum" id="is_subForum" value="true">
                        <label for="is_subForum" class="peer-placeholder-shown:opacity-100 opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Subforum</label>
                    </div>
                    <button class="w-full bg-indigo-600 text-white p-3 rounded-md">Submit</button>
                        @if ($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-red-500 text-md">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                </form>
                @endauth
                @guest
                    <div>
                        <p class="text-center">You must be <a class="text-purple-600 hover:text-purple-900 hover:underline" href="/login">Logged in</a> to create a thread.</p>
                    </div>
                @endguest
            </div>
        </div>
    </div>

</x-layout>