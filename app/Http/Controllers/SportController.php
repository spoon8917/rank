<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    

public function create(Sport $sport)
{
    return view('auth/register')->with(['sports' => $sport->get()]);
}
