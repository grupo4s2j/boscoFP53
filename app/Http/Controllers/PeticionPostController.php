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
        $to = 'user@example.com';
        $subject = "Beautiful HTML Email using PHP by CodexWorld";

        $htmlContent = '
            <html>
            <head>
                <title>Welcome to CodexWorld</title>
            </head>
            <body>
                <h1>Thanks you for joining with us!</h1>
                <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
                    <tr>
                        <th>Name:</th><td>CodexWorld</td>
                    </tr>
                    <tr style="background-color: #e0e0e0;">
                        <th>Email:</th><td>'.$request->input('email').'</td>
                    </tr>
                    <tr>
                        <th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td>
                    </tr>
                </table>
            </body>
            </html>';

        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: TSFI<sender@example.com>' . "\r\n";
        $headers .= 'Cc: welcome@example.com' . "\r\n";
        $headers .= 'Bcc: welcome2@example.com' . "\r\n";

        // Send email
        if(mail($to,$subject,$htmlContent,$headers)){
            $successMsg = 'Email has sent successfully.';
        }
        else
            $errorMsg = 'Email sending fail.';
    }
    
    /**
     * Envia la Petición por Email
     *
     * @return  mensaje de OK
     */
    public function sendPostMailLaravel(Request $request)
    {
        $title = $request->input('name');
        $content = $request->input('message');
        //Grab uploaded file
        $attach = $request->file('file');

        Mail::send('fo.octagon_layout.octagon_mailing.mail', ['title' => $title, 'content' => $content], function ($message) //use ($attach)
        {

            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to('danirocar@hotmail.com');

            //Attach file
            //$message->attach($attach);

            //Add a subject
            $message->subject("Hello from Scotch");

        });
    }
}
