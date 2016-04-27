<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index()
    {
        return view('backend.content.index');
    }
}
