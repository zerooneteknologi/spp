<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /** 
     * view classroom list
    */
    
    public function index()
    {
        return view('admin.classroom.index');
    }
    
}
