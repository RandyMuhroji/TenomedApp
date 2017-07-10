<?php

namespace Tenomed;


use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Tenomed\Models\User;

use Mail;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
        $message = sprintf('Activate account <a href="%s">%s</a>', $link, $link);

        $this->mailer->raw($message, function (Message $m) use ($user) {
            $m->to($user->email)->subject('Tenomed - Activation mail');
        });

        // $data = ['link' => $link];
        // Mail::send(['html' => 'mail.send_activation_code'], $data, function($message) use ($user)   {
        //      $message->to('randymuhroji@gmail.com', 'Randy Muhroji')->subject('Tenomed - Activation mail');
        //      $message->from('tenomed01@gmail.com','Tenomed');
        // });

       

    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->status = 1;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}