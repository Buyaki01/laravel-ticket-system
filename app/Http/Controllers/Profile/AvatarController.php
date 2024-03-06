<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request) {
        dd($request->all());
        return response()->redirectTo(route('profile.edit'))->with('success', 'Avatar was successfully updated.');
    }
}
