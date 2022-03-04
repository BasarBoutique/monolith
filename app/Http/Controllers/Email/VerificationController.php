<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\Email\VerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function sendVerificationEmail(Request $request): array
    {
        if($request->user()->hasVerifiedEmail()) {
            return [
                'status' => 'already-verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return [
            'status' => 'verification-link-sent',
        ];
    }

    public function verify(VerificationRequest $request)
    {


        if($request->user()->hasVerifiedEmail()) {
            return [
                'status' => 'already-verified'
            ];
        }

        if($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'status' => 'email-has-been-verified'
        ];
    }
}
