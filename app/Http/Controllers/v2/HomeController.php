<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
// use App\Jobs\UserMailJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class HomeController extends Controller
{
    //
    public function email()
    {
        $email = "manvfx@gmail.com";
        $mail = new UserMail();
        Mail::to($email)->send($mail);
        // dispatch(new UserMailJob($email));

        return response()->json([
            "data" => [
                "message" => "success mail sended",
                "status" => "success"
            ]
        ]);
    }
}
