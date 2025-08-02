<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route("index");
        }

        $candidates = Candidate::all();
        return view("admin/candidates", ["candidates" => $candidates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {

        if ($request->input("nik_validate") == "true") {
            $candidate = Candidate::where(
                column: ["nik" => $request->nik, "email" => $request->email, "no_telp" => $request->no_telp],
                boolean: 'or'
            )->first();

            if ($candidate) {
                return redirect()->back()->withErrors(["Anda sudah terdaftar!"]);
            }

            $candidate = new Candidate([
                ...$request->validated(),
                'status' => "unverified",
                'submit_date' => now(),
                'phase' => 1,
            ]);
            $is_success = $candidate->save();

            if ($is_success) {
                return redirect()->back()->with(["message" => "Pendaftaran Berhasil!"]);
            } else {
                return redirect()->back()->withInput($request->all())->withErrors(["Pendaftaran gagal disimpan!"]);
            }
        } else {
            return redirect()->back()->withInput($request->all())->withErrors(["Masukkan NIK yang valid!"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $is_success = $candidate->update($request->validated());
        if ($is_success) {
            return redirect()->back()->withInput(["message" => "Data calon siswa berhasil diperbarui!"]);
        } else {
            return redirect()->back()->withErrors(["Data gagal diperbarui!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        if (!Auth::check()) {
            return redirect()->route("index");
        }

        $is_success = $candidate->delete();
        if ($is_success) {
            return redirect()->back()->withInput(["message" => "Data calon siswa berhasil dihapus!"]);
        } else {
            return redirect()->back()->withErrors(["Data gagal dihapus!"]);
        }
    }
}
