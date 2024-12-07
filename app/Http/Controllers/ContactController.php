<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Mail::to('ahmadjaelani8685@gmail.com', $data['name'])->send(new SendEmail($data));

        return response()->json(['message' => 'Email Berhasil dikirim.']);
    }

    // public function ensureIsNotRateLimited(Request $request) {
    //     if (! RateLimiter::tooManyAttempts($this->throttleKey(), 1)) {
    //         return;
    //     }

    //     $seconds = RateLimiter::availableIn($this->throttleKey());

    //     throw ValidationException::withMessages([
    //         'email' => ['Throttle limit exceeded. Please try again after ' . $seconds . ' seconds.'],
    //     ]);
    // }

    //  /**
    //  * Get the rate limiting throttle key for the request.
    //  */
    // public function throttleKey(): string
    // {
    //     return Str::transliterate(Str::lower($this->string('send-email')).'|'.$this->ip());
    // }
}
