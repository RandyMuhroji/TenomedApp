<?php

namespace Tenomed\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class MailController extends Controller
{
    public function basic_email()
    {
    	$data = ['name' => 'randy muhroji'];
    	Mail::send(['text' => 'mail'], $data, function($message){
    		 $message->to('randymuhroji@gmail.com', 'Randy Muhroji')->subject('test aja nih');
    		 $message->from('tenomed@gmail.com','Tenomed');
    	});

    	echo "email was sent";
    }

    public function html_email()
    {
        $email = 'randymuhroji@gmail.com';
        $data = ['link' => 'http://facebook.com'];
    	Mail::send(['html' => 'mail.send_activation_code'], $data, function($message) use($email){
    		 $message->to($email, 'Randy Muhroji')->subject('can view HTML');
    		 $message->from('tenomed01@gmail.com','Tenomed');
    	});

    	echo "email was sent";	
    }

    public function attachment_email()
    {
        $email = 'randymuhroji@gmail.com';
    	$data = ['name' => 'randy muhroji'];
    	Mail::send(['text' => 'mail'], $data, function($message){
    		 $message->to('randymuhroji@gmail.com', 'Randy Muhroji')->subject('can view HTML');
    		 //attachment here
    		 $message->attach('D:\Data\Berkas Lamaran\pasFoto.jpg');
    		 $message->from('tenomed@gmail.com','Tenomed');
    	});

    	echo "email was sent";	
    }
}
