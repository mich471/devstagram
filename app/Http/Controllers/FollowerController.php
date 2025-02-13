<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store (User $user) {
        $user->followers()->attach(auth()->user()->id, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        return back();
    }

    public function destroy(User $user) {
        $user->followers()->detach( auth()->user()->id);
        return back();
    }
}
