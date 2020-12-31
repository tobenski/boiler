<?php

namespace App\Http\Controllers;

use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return config('app.name');
    }
}
