<?php

namespace App\Helper;

use Illuminate\Support\Facades\Notification;
use App\User;
use App\Role;
use Auth;

class CustomNotify
{
    //TODO: Notify Administrator
    public static function Admin($subject, $message)
    {
        $user = Role::where('name', 'Administrator')->first()->users()->get(); //Get all Administrator $user

        $details = [
            'header'    => Auth::user()->name,
            'subject'   => $subject,
            'body'      => $message,
        ];

        //Send notification to all $user where role is Administrator
        Notification::send($user, new \App\Notifications\notify($details));
    }

    //TODO: Notify Curator
    public static function Curator($subject, $message)
    {
        $user = Role::where('name', 'Curator')->first()->users()->get(); //Get all Administrator $user

        $details = [
            'header'    => Auth::user()->name,
            'subject'   => $subject,
            'body'      => $message,
        ];

        //Send notification to all $user where role is Administrator
        Notification::send($user, new \App\Notifications\notify($details));
    }

    //TODO: Notify Admin and Curator
    public static function Both($subject, $message)
    {
        CustomNotify::Curator($subject, $message);
        CustomNotify::Admin($subject, $message);
    }

    //TODO: Notify Artist
    public static function Artist($user, $subject, $message)
    {
        $user = User::find($user);

        $details = [
            'header'    => Auth::user()->name,
            'subject'   => $subject,
            'body'      => $message,
        ];

        $user->notify(new \App\Notifications\notify($details));
    }


}
