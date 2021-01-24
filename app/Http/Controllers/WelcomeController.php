<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
