<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class AreaInteresseController extends Controller
{
    public function show() {
        $id = Auth::id();
        $data = \App\Models\VwCurriculos::where('users', $id)->first();
        $user = User::where('id', $id)->first();
        view()->share('user', $user);
        return View("admin.areainteresse",["dados" => $this]);
    }
    public function list(Request $request) {
        
        $data = \App\Models\AreasInteresse::get();
        
        return Datatables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action', function($row) {
                                    $btn = '<a href="/admin/areas/' . $row->idareainteresse . '" class="edit btn btn-primary btn-sm">Verificar</a>';
                                    return $btn;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
    }
    public  function item($id) {
        
    }
}
