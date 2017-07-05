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
    	$data = ['name' => 'randy muhroji'];
    	Mail::send(['html' => 'mail'], $data, function($message){
    		 $message->to('randymuhroji@gmail.com', 'Randy Muhroji')->subject('can view HTML');
    		 $message->from('tenomed@gmail.com','Tenomed');
    	});

    	echo "email was sent";	
    }

    public function attachment_email()
    {
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
