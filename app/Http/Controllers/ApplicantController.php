<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(JobOpening $jobOpening){
        return view('applicants.index', [
            'jobOpening' => $jobOpening
        ]);
    }
}
