<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
//        dd($user->tweets());
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->simplePaginate(5),
        ]);
    }

    public function edit(User $user)
    {
//        fitst solution with user policy
//        $this->authorize('edit', $user);

//        or second solution
//        if (auth()->user()->isNot($user))
//        {
//            abort(404);
//        }
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
//        dd(request());
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);
        return redirect('/profiles/'.$user->username);
    }
}
