<x-layout title="Report">
    <x-normalPage>
        <a href="/profile/{{$report->reporting->slugified_user}}/private-message">{{$report->reporting->username}}</a>
        <a href="/profile/{{$report->reported->slugified_user}}/private-message">{{$report->reported->username}}</a>
        <p>@bb($report->reported_content)</p>
        <p>@bb($report->report_comments)</p>
    </x-normalPage>
</x-layout>