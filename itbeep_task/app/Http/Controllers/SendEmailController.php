<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index(){
        //
    }

    function send(): \Illuminate\Support\Collection
    {
            $services = "";
            $usersData = DB::table('users')
            ->join('services', 'services.user_id', '=', 'users.user_id')
            ->join('interests', 'interests.user_id', '=', 'users.user_id')
            ->where('interests.choose', '=', 1)
            ->where('services.choose', '=', 1)
            ->get();

            foreach ($usersData as $value)
            {
                $services .= $value->service_name;
            }

            $data = array(
                'name'    => $usersData[0]->name,
                'mobile'  => $usersData[0]->mobile,
                'interest'=> $usersData[0]->interested_period,
                'services'=> $services,
            );

            Mail::to($usersData[0]->email)->send(new SendMail($data));

            return $usersData;
    }
}



