<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Http\Request;

class jobOpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', jobOpening::class);
        return view('jobOpenings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', jobOpening::class);
        return view('jobOpenings.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(JobOpening $jobOpening)
    {
        return view('jobOpenings.show',[
            'jobOpening' => $jobOpening
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOpening $jobOpening)
    {
        $this->authorize('update', $jobOpening);
        return view('jobOpenings.edit',[
            'jobOpening' => $jobOpening
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
