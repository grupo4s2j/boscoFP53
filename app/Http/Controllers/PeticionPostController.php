<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class PeticionPostController extends Controller
{
    /**
     * Envia la Petición por Email
     *
     * @return  mensaje de OK
     */
    public function sendPost(Request $request)
    {
        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}
