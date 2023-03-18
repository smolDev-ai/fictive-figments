<x-layout title="Admin Panel">

    <x-normalPage>
        @foreach($reports as $report)
            <a href="/admin/report/{{$report->id}}">
                <div class="flex flex-row">
                    {{$report->reporting->username}} reported content by: {{$report->reported->username}}
                </div>
            </a>
        @endforeach
    </x-normalPage>

</x-layout>
