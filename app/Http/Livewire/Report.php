<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserReport;
use Livewire\Component;

class Report extends Component
{
    public $show = false;
    public $content;
    public $comments;
    public $reportedUser;

    public function submitReport()
    {
        $report = [
            "reporting_user" => auth()->user()->id,
            "reported_user" => $this->reportedUser,
            "reported_content" => $this->content,
            "report_comments" => $this->comments,
        ];

        $newReport = UserReport::create($report);

        session()->flash('success', 'Report sent!');

        $this->show = false;

        $users = User::all();

        foreach ($users as $user) {
            if ($user->isStaff()) {
                $user->newReport($newReport);
            }
        }
    }

    public function render()
    {
        return view('livewire.report');
    }
}
