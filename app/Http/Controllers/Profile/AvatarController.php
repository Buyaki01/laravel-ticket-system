<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {
        $path = $request->file('avatar')->store('avatars', 'public');
        
        auth()->user()->update(['avatar' => $path]);

        return response()->redirectTo(route('profile.edit'))->with('success', 'Avatar updated successfully.');
    }
}
