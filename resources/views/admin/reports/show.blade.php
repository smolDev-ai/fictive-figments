<x-layout title="Report">
    <x-normalPage>
        <a href="/profile/{{$report->reporting->slugified_user}}/new/private-message">PM {{$report->reporting->username}}</a>
        <a href="/profile/{{$report->reported->slugified_user}}/new/private-message">PM {{$report->reported->username}}</a>
        <a href="/profile/{{$report->reported->slugified_user}}/new/private-message?participants={{$report->reporting->username}}">Message All</a>
        <br /><br />
        <b>Reported Content:</b><br />
        <p>@bb($report->reported_content)</p>
        <br />
        <br />
        @if($report->report_comments != '')
        <b>{{$report->reporting->username}}'s Comments:</b><br />
        <p>@bb($report->report_comments)</p>
        @else
        <p>{{$report->reporting->username}} did not leave any comments.</p>
        @endif
    </x-normalPage>
</x-layout>
