<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.patient-support.index');
    }
}
