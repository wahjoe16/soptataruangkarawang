<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $applications = Application::with('sop')->whereNot('status', 0)->where('user_id', Auth::user()->id)->get();
        
        $data = [
            'user' => $request->user(),
            'title' => 'Profile User',
            'applications' => $applications,
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

        $publicHtmlPath = "/home/u741066030/domains/e-soptataruangkarawang.id/public_html";

        if ($request->hasFile('photo')) {

            // Hapus file lama
            if (!empty($user->photo)) {
                $oldFile = $publicHtmlPath . '/storage/user/photo/' . $user->photo;
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            // Upload file baru
            $file = $request->file('photo');
            $name = 'user_' . time() . '.' . $file->getClientOriginalExtension();

            // simpan ke public_html/storage/user/photo
            $file->move($publicHtmlPath . '/storage/user/photo', $name);

            $user->photo = $name;

        } else {
            $user->photo = $request->current_photo;
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
