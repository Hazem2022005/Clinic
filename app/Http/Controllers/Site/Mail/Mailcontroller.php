<?php

namespace App\Http\Controllers\Site\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class Mailcontroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = [
            'name' => 'Mohamed',
            'code' => rand(1000, 9999),
        ];

        Mail::to('hhazm6745@gmail.com')->send(new Sendmail($data));

        dd('mail sent');
    }
}
