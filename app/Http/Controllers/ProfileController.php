<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(int $id)
    {
        return view('profile', ['profile' => Profile::where('user_id', '=', $id)->first()]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('edit-profile', ['user' => User::find($id)]);
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $profile = Profile::where('user_id', '=', $id)->first();

        $user = User::find($id);

        if ($request->input('avatar')) {
            $user->image = 'images/avatars/' . $request->input('avatar');
        }

        $profile->address = $request->input('address');
        $profile->number = $request->input('number');
        $profile->telegram = $request->input('telegram');
        $profile->description = $request->input('description');
        $profile->name = $request->input('name');

        if ($profile->save() && $user->save()) {
            return Redirect::to('/profile/' . $id);
        }

        return Redirect::back()->withErrors('Something went wrong. Try again pls');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'video' => ['required']
        ]);

        if ($validatedData) {
            $video = new Video();

            $video->name = $request->input('name');
            $video->desc = $request->input('description');
            $video->src = '/videos/' . $request->input('video');
            $video->user_id = $id;

            if ($video->save()) {
                return Redirect::to('/profile/' . $id);
            }
        }

        return Redirect::back()->withErrors('Something went wrong. Try again pls');
    }

    /**
     * @param Video $video
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Video $video)
    {
        if ($video->delete()) {
            return Redirect::to('/profile/' . Auth::id());
        }

        return Redirect::back()->withErrors('Something went wrong. Try again pls');
    }
}
