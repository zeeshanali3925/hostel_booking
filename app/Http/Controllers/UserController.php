<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('users.partials.list', compact('users'))->render();
        }

        return view('users.index', compact('users'));
    }
}
