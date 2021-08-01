<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ProfileController extends Controller
{
    public function paginate($items, $perPage = 15, $page = null, $getValues = true)
    {
        $pageName = 'page';
        $page     = $page ?: (Paginator::resolveCurrentPage($pageName) ?: 1);
        $items    = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator(
            $getValues
                ? $items->forPage($page, $perPage)->values()
                : $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            [
                'path'     => Paginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }

    public function show($username)
    {
        $user = User::where('username', $username)->first();
        $allContent = $user->threads->merge($user->posts)->sortByDesc('created_at');

        return view('profile.show', [
            "profileUser" => $user,
            "allContent" => $this->paginate($allContent, 10)
        ]);
    }

    public function me()
    {
        $user = User::where('username', request()->user()->username)->first();
        $allContent = $user->threads->merge($user->posts)->sortByDesc('created_at');

        return view('profile.show', [
            "profileUser" => $user,
            "allContent" => $this->paginate($allContent, 10)
        ]);
    }
}
