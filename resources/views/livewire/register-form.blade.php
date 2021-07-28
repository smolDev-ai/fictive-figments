<div>
    <x-layout title="Register"> 
        <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 w-11/12 max-w-xl sm:mx-auto">
            <div class="relative p-8 bg-white shadow-sm sm:rounded-xl">
                    <form method="POST" action="/register" wire:submit.prevent="submitForm">
                        @csrf
                        @if(session()->has('success'))
                            <div class="bg-green-500">{{session('success')}}</div>
                        @endif
                        <div class="mb-5 relative">
                        <input type="email" wire:model.defer="email" name="email" id="email" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" placeholder="name@example.com" autocomplete="off" value={{ old('email') }} required/>
                        <label for="email" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Email address</label>
                        
                       </div>
                        <div class="mb-5 relative">
                         <input type="username" wire:model.defer="username" name="username" id="username" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" placeholder="shadowrunner245" autocomplete="off" value={{ old('username') }} required/>
                        <label for="username" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Username</label>
                             
                        </div>
                        <div class="mb-5 relative">
                        <input type="password" wire:model.defer="password" name="password" id="password" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" placeholder="password" autocomplete="off" required />
                        <label for="password" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Password</label>
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
                    </div>
                </div>
            </div>
 </x-layout>
</div>
