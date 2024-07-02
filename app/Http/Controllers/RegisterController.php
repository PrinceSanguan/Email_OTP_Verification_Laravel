<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => rand(100000, 999999),
        ]);

        // Send OTP
        Mail::raw("Your OTP is: " . $user->otp, function ($message) use ($user) {
            $message->to($user->email)
                ->subject('OTP Verification');
        });

        return redirect()->route('verify.otp', ['email' => $user->email]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'otp' => 'required|numeric|digits:6',
        ]);

        $user = User::where('email', $request->email)
                    ->where('otp', $request->otp)
                    ->first();

        if ($user) {
            $user->otp = null; // Clear OTP after verification
            $user->save();

            // Log the user in (optional)
            auth()->login($user);

            return redirect()->route('success');
        }

        return redirect()->route('error');
    }
}
