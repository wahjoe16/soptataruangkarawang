<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $data = [
            'user' => $request->user(),
            'title' => 'Profile User',
        ];

        return view('profile.edit', $data);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg'
        ]);

        $user = Auth()->user();
        $user->name = $request['name'] ?? '' ;
        $user->email = $request['email'] ?? '' ;
        $user->level = $request['level'] ?? '' ;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if (!is_null($photo)) {
                File::delete(public_path('/user/photo/' . $user->photo));
                $name = "user_" . time() . "." . $photo->getClientOriginalExtension();
                $path = public_path('/user/photo');
                $photo->move($path, $name);
                $user->photo = $name;
            } elseif (!empty($request['current_photo'])) {
                $user->photo = $request['current_photo'];
            } else {
                $user->photo = "";
            }
        }
        
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diupdate!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
