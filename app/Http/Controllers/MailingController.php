<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\UserWelcomeMail;

class MailingController extends Controller
{
	public function sendMailableMail()
	{
		$data = [
    			'sender_name'=>'Jname4', 
    			'sender_email'=>'jagabandhu040@gmail.com',
    			'receiver_name'=>'Jname3', 
    			'receiver_email'=>'jagabandhu030@gmail.com',
    		];

    	// Mail::send(new UserWelcomeMail($data));

    	// send to queue jobs
    	Mail::queue(new UserWelcomeMail($data));

    	echo "Mailable send by queue successfully!";
    	
    	return ;
	}

    public function basic_email()
    {
    	$this->sendMailableMail();
    	return;

    	$data = ['name'=>'Jaga'];

    	Mail::send(['text'=>'emails.mail'], $data, function ($message)
    	{
    		$message->to('jagabandhu030@gmail.com', 'Jagabandhu R')->subject('Checking Mail');

    		$message->from('jagabandhu040@gmail.com', 'Devs44 Help');

    		echo "Text Email send successfully!";

    	});
    }

    public function html_email() {

      $data = array('name'=>"Jaga");

      Mail::send('emails.mail', $data, function($message) {

         $message->to('jagabandhu040@gmail.com', 'Jaga 3')->subject
            ('Laravel HTML Testing Mail');
         $message->from('jagabandhu030@gmail.com', 'Devs44 Help');
      });

      echo "HTML Email Sent. Check your inbox.";
   }

   public function attachment_email() {

      $data = array('name'=>"Jaga");

      Mail::send('emails.mail', $data, function($message) {

         $message->to('jagabandhu030@gmail.com', 'Jaga 3')->subject
            ('Laravel Testing Mail with Attachment');

         $message->attach('L:\xampp\htdocs\lv\laravel-advance\public\files\images\1547788562.jpg');
         $message->attach('L:\xampp\htdocs\lv\laravel-advance\public\files\test.txt');
         $message->from('jagabandhu040@gmail.com', 'Devs44 Help');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
