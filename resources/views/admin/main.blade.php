<x-layout title="Admin Panel">

    <div class="container mx-auto my-5">
        <div class="grid grid-cols-2 bg-white lg:mt-10 lg:flex lg:flex-col border-2 px-4 py-5 shadow-lg">
            <aside>
                <ul>
                    <li><a href="/admin/categories">Categories</a></li>
                    <li><a href="/admin/forums">Forums</a></li>
                    <li><a href="/admin/reports/">Reports</a></li>
                </ul>
            </aside>
            {{request()->user()->username}} is staff!

        </div>
    </div>


</x-layout>
