<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Complaint;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $user = $request->user();
            $validated = $request->validated();
    
            // Handle file upload for profile image
            if ($request->hasFile('profile_image')) {
                if ($user->profile_image) {
                    // Delete old profile image if it exists
                    Storage::disk('public')->delete($user->profile_image);
                }
    
                // Save new profile image
                $path = $request->file('profile_image')->store('profile_images', 'public');
                $validated['profile_image'] = $path; // Save the path to the database
            }
    
            // Save other user data
            $user->fill($validated);
    
            // Check if email is updated
            if ($user->isDirty('email')) {
                $user->email_verified_at = null; // Reset email_verified_at if email is changed
            }
    
            // Save the updated user data
            $user->save();
    
            // Return success response with status
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $e) {
    
            // Redirect back to the profile edit page with an error message
            return Redirect::route('profile.edit')->with('error', 'Failed to update profile. Please try again.');
        }
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

    public function show()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('profile.show', compact('user'));
    }

    public function deleteImage(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image); // Pastikan disk sesuai
            $user->profile_image = null;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-image-deleted');
    }

}
