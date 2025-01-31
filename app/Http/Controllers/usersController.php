<?php

namespace App\Http\Controllers;

use App\Http\Requests\userStoreRequest;
use App\Http\Requests\userUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class usersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        return view('user.create');
    }

    public function store(userStoreRequest $request)
    {
        $user = User::create($request->validated());

        $request->session()->flash('user.id', $user->id);

        return redirect()->route('users.index');
    }

    public function show(Request $request, user $user)
    {
        return view('user.show', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, user $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(userUpdateRequest $request, user $user)
    {
        $user->update($request->validated());

        $request->session()->flash('user.id', $user->id);

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, user $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
