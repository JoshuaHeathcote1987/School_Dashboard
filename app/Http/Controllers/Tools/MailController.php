<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;

class MailController extends Controller
{
    public function accountCreated($address)
    {
        $details = [
            'subject' => 'Your Halycon-School Account was Successfully Created!',
            'title' => 'Account Created!',
            'body' => 'Welcome to Halycon School! We look forward to meeting you.'
        ];

        Mail::to($address)->send(new SendMail($details));
    }

    public function sendPrivate(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|max:255',
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

        $address = $request->input('address');
        
        $details = [
            'subject' => $request->input('subject'),
            'title' => "Halycon-School",
            'body' => $request->input('body')
        ];

        try {
            Mail::to($address)->send(new SendMail($details));
        } catch (\Throwable $th) {
            return redirect()->back()->withFail('Unable to send email.');
        }
        
        return redirect()->back()->withSuccess('Email sent.');
    }

    public function getMail()
    {
        /** @var \Webklex\PHPIMAP\Client $client */
        $client = \Webklex\IMAP\Facades\Client::make([
            'host'          => 'imap.hostinger.com',
            'port'          => 993,
            'encryption'    => 'tls',
            'validate_cert' => true,
            'username'      => 'admin@coteheath.tech',
            'password'      => 'Teamfortress1',
            'protocol'      => 'imap'
        ]);
        /* Alternative by using the Facade
        $client = Webklex\IMAP\Facades\Client::account('default');
        */

        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        //Loop through every Mailbox
        /** @var \Webklex\PHPIMAP\Folder $folder */
        foreach($folders as $folder){

            //Get all Messages of the current Mailbox $folder
            /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
            $messages = $folder->messages()->all()->get();
            
            /** @var \Webklex\PHPIMAP\Message $message */
            foreach($messages as $message){
                echo $message->getSubject().'<br />';
                echo 'Attachments: '.$message->getAttachments()->count().'<br />';
                echo $message->getHTMLBody();
                
                //Move the current Message to 'INBOX.read'
                if($message->moveToFolder('INBOX.read') == true){
                    echo 'Message has ben moved';
                }else{
                    echo 'Message could not be moved';
                }
            }
        }
    }
}
