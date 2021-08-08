<x-layout title="Admin Panel">

    <x-normalPage>
        @foreach($reports as $report)
            <a href="/admin/report/{{$report->id}}">
                <div class="flex flex-row">
                    <p>{{$report->reporting->username}}</p>
                    <p>{{$report->reported->username}}</p>
                    <p>@bb($report->reported_content)</p>
                    <p>@bb($report->report_comments)</p>
                </div>
            </a>
        @endforeach
    </x-normalPage>

</x-layout>