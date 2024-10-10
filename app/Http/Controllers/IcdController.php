<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class IcdController extends Controller
{
    public function index()
    {
        return view('icd.index');
    }

    public function data()
    {
        $query = Icd::query();

        return DataTables::of($query)
            ->addColumn('action', function ($icd) {
                $user = auth()->user();
                $actions = '<button class="btn btn-sm btn-primary pilihIcd" data-id="' . $icd->code . '" data-name="' . $icd->name_id . '">Pilih</button>';

                if ($user && $user->role == 1) {
                    $actions .= ' <button class="btn btn-sm btn-warning edit-icd" 
                                data-code="' . $icd->code . '" 
                                data-name-id="' . htmlspecialchars($icd->name_id, ENT_QUOTES) . '" 
                                data-name-en="' . htmlspecialchars($icd->name_en, ENT_QUOTES) . '">Edit</button>';
                    $actions .= ' <button class="btn btn-sm btn-danger delete-icd" data-code="' . $icd->code . '">Delete</button>';
                }

                return $actions;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function store(Request $request)
    {
        $request->validate([
            'code' => 'nullable|unique:icds',
            'name_id' => 'nullable',
            'name_en' => 'nullable'
        ]);

        DB::beginTransaction();
        try {
            $data = $request->only(['code', 'name_id', 'name_en']);
            $data = array_filter($data, function ($value) {
                return $value !== null && $value !== '';
            });

            Icd::create($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'ICD created successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Failed to create ICD.'], 500);
        }
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'code' => 'nullable|unique:icds,code,' . $code . ',code',
            'name_id' => 'nullable',
            'name_en' => 'nullable'
        ]);

        DB::beginTransaction();
        try {
            $icd = Icd::findOrFail($code);
            $data = $request->only(['code', 'name_id', 'name_en']);
            $data = array_filter($data, function ($value) {
                return $value !== null && $value !== '';
            });

            $icd->update($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'ICD updated successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Failed to update ICD.'], 500);
        }
    }

    public function destroy($code)
    {
        DB::beginTransaction();
        try {
            $icd = Icd::findOrFail($code);
            $icd->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'ICD deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Failed to delete ICD.'], 500);
        }
    }
}
