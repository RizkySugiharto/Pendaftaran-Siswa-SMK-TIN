<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Auth;
use Illuminate\Http\Client\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect("");
        }

        $candidates = Candidate::all();
        return view("admin/candidates", ["candidates" => $candidates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("form_psb");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $candidate = Candidate::create($request->validated());
        $is_success = $candidate->save();

        if ($is_success) {
            return redirect("");
        } else {
            return redirect("");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $is_success = $candidate->update($request->validated());
        if ($is_success) {
            return redirect("")->withInput([]);
        } else {
            return redirect("");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $is_success = $candidate->delete();
        if ($is_success) {
            return redirect("");
        } else {
            return redirect("");
        }
    }
}
