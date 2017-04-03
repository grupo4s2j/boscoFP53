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
        //$title = $request->input('name');
        //$content = $request->input('message');
        //Grab uploaded file
        //$attach = $request->file('file');

        /*Mail::send('fo.octagon_layout.octagon_mailing.mail', ['title' => $title, 'content' => $content], function ($message) //use ($attach)
        {

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to('danirocar@hotmail.com');

            //Attach file
            //$message->attach($attach);

            //Add a subject
            $message->subject("Hello from Scotch");

        });*/
        $to = 'danirocar@hotmail.com';
        $subject = 'Petición de POST';
        $message = $request->input('message');
        $headers = 'From: '. $request->input('email') . "\r\n" .
            'Reply-To: tsfi@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
}
