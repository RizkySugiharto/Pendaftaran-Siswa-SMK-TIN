<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrStoreGradeRequest;
use App\Models\Candidate;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return $grades;
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return $candidate->grades()->get(['id', 'name', 'value', 'created_at', 'updated_at', 'created_by', 'updated_by']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateOrStore(UpdateOrStoreGradeRequest $request, Candidate $candidate)
    {
        $grades = $request->validated();
        $isFailed = false;

        foreach ($grades as $grade) {
            $objGrade = Grade::updateOrCreate([
                "nik" => $candidate->nik,
                "name" => $grade['name'],
            ], $grade);

            $isSuccess = $objGrade->update($objGrade->created_by == null ? [
                "created_by" => Auth::user()->id,
            ] : [
                "updated_by" => Auth::user()->id,
            ]);

            if (!$isSuccess) {
                $isFailed = true;
                break;
            }
        }

        if (!$isFailed) {
            return ["success" => "Data nilai dari calon peserta berhasil disimpan!"];
        } else {
            throw new BadRequestHttpException("Data nilai dari calon peserta gagal disimpan!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->grades()->delete();
        return ["success" => "Seluruh data nilai dari calon peserta berhasil dihapus!"];
    }
}
