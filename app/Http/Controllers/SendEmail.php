<?php

namespace App\Http\Controllers;

use App\Mail\TestSendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index()
    {
        Mail::to('dikjulpler@gmail.com')->send(new TestSendEmail());
    }
}
