<?php

namespace App\Http\Controllers;

use App\CandidateGender;
use App\CandidateStatus;
use App\Http\Requests\ShowCandidateRequest;
use App\Http\Requests\StoreCandidateRequestAPI;
use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Grade;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Request;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route("index", ["title" => "Selamat Datang Di SMK TIN"]);
        }

        $candidates = Candidate::all();
        return view("admin/candidates", ["title" => "Daftar Calon Peserta Didik | TIN","id_css" => "calonphp","candidates" => $candidates]);
    }

    public function leaderboard(){
        $data = Grade::selectRaw("candidates.fullname, candidates.prev_school, CAST(AVG(value) AS UNSIGNED) AS avg_value")->join('candidates', 'candidates.nik', '=', 'grades.nik')->groupBy('candidates.nik')->orderBy("avg_value","desc")->limit(200)->get();
        return view("leaderboard", ["title" => "Leaderboard | Siswa SMK TIN", "data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function show(Candidate $candidate)
    {
        if (!Auth::check()) {
            return redirect()->route("index");
        }
        return view("admin.candidate-details", [
            "title" => "Daftar Calon Peserta Didik | TIN",
            "candidate" => $candidate,
            "grades" => $candidate->grades()->get(),
            "id_css" => "calonphp",
            "genders" => CandidateGender::cases(),
            "statuses" => CandidateStatus::cases()
        ]);
    }

    public function create()
    {
        return view("register", ["title" => "Formulir Pendaftaran | TIN"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $error_terdaftar_message = [
            ["name" => "nik", "message" => "Nik calon peserta didik sudah terdaftar"],
            ["name" => "no_telp", "message" => "Nomor Telepon calon peserta didik sudah terdaftar"],
            ["name" => "email", "message" => "Email calon peserta didik sudah terdaftar"]
        ];
        if ($request->input("nik_validate") == "true") {
            $candidate = Candidate::where(
                column: ["nik" => $request->nik, "email" => $request->email, "no_telp" => $request->no_telp],
                boolean: 'or'
            )->first();

            if ($candidate) {
                for($i =0; $i < count($error_terdaftar_message); $i++){
                    if($candidate[$error_terdaftar_message[$i]["name"]] == $request->input($error_terdaftar_message[$i]["name"])){
                        return redirect()->back()->withErrors([$error_terdaftar_message[$i]["message"]])->withInput($request->all());
                    }
                }
            }

            $candidate = new Candidate([
                ...$request->validated(),
                'status' => "unverified",
                'submit_date' => now(),
                'phase' => 1,
            ]);
            $is_success = $candidate->save();

            if ($is_success) {
                return view('registered')->with(["title" => "Pendaftaran Berhasil | TIN","terdaftar" => true, "fullname" => $candidate["fullname"], "email" => $candidate["email"]]);
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
        $isSuccess = $candidate->update($request->validated());
        if ($isSuccess) {
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

        $isSuccess = $candidate->delete();
        if ($isSuccess) {
            return redirect()->back()->withInput(["message" => "Data calon siswa berhasil dihapus!"]);
        } else {
            return redirect()->back()->withErrors(["Data gagal dihapus!"]);
        }
    }

    /**
     * Display the specified resource in version of API.
     */
    public function showAPI(Candidate $candidate)
    {
        $filtered = $candidate->only([
            "nik",
            "fullname",
            "email",
            "no_telp",
            "address",
            "prev_school",
            "parent_name",
            "parent_email",
            "parent_telp",
            "major",
            "gender",
            "birth_date",
        ]);
        $filtered["birth_date"] = date("d/m/Y", strtotime($filtered["birth_date"]));

        return response()->json($filtered);
    }

    /**
     * Store a candidate data in version of API
     */
    public function registerAPI(StoreCandidateRequestAPI $request)
    {
        $error_terdaftar_message = [
            ["name" => "nik", "message" => "Nik calon peserta didik sudah terdaftar"],
            ["name" => "no_telp", "message" => "Nomor Telepon calon peserta didik sudah terdaftar"],
            ["name" => "email", "message" => "Email calon peserta didik sudah terdaftar"]
        ];
        $candidate = Candidate::where(
            column: ["nik" => $request->nik, "email" => $request->email, "no_telp" => $request->no_telp],
            boolean: 'or'
        )->first();

        if ($candidate) {
            for($i =0; $i < count($error_terdaftar_message); $i++){
                if($candidate[$error_terdaftar_message[$i]["name"]] == $request->input($error_terdaftar_message[$i]["name"])){
                    throw new ConflictHttpException($error_terdaftar_message[$i]["message"]);
                }
            }
        }

        $candidate = new Candidate([
            ...$request->validated(),
            'status' => "unverified",
            'submit_date' => now(),
            'phase' => 1,
        ]);
        $is_success = $candidate->save();

        if ($is_success) {
            return response()->json([
                "success" => "Pendaftaran berhasil disimpan!"
            ]);
        } else {
            throw new ConflictHttpException($error_terdaftar_message[$i]["Pendaftaran gagal disimpan!"]);
        }
    }
}
