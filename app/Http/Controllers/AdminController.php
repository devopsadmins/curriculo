<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AreasInteresse;
use App\Models\Escolaridades;
use App\Models\Idiomas;
use App\Models\Cidades;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AdminController extends Controller {

    public $areas;
    public $escolaridades;
    public $idiomas;
    public $cidades;

    public function filtros() {
        $this->areas = AreasInteresse::where('ativo', 1)->get();
        $this->escolaridade = Escolaridades::where('ativo', 1)->get();
        $this->idiomas = Idiomas::where('ativo', 1)->get();
        $this->cidades = Cidades::where('ativo', 1)->get();
    }

    public function show() {

        $this->filtros();

        if (Auth::user()->current_team_id == 1)
            return View("admin.admin", ["dados" => $this]);
        else
            return redirect('admin');
    }

    public function perfis() {

        $this->filtros();

        if (Auth::user()->current_team_id == 1)
            return View("admin.admin");
        else
            return redirect('admin');
    }

    public function users(Request $request) {
        $filtro = "1=1 ";
        $area = $request->input('area');
        $escola = $request->input('escola');
        $idioma = $request->input('idioma');
        $cidade = $request->input('cidade');

        if ($area != 0)
            $filtro .= " AND areainteresse_id = " . $area;
        if ($escola != 0)
            $filtro .= " AND escolaridade_id = " . $escola;
        if ($idioma != 0)
            $filtro .= " AND idioma_id = " . $idioma;
        if ($cidade != 0)
            $filtro .= " AND cidade_id = " . $cidade;

        if (Auth::user()->current_team_id == 1) {
            if ($request->ajax()) {

                $data = \App\Models\VwCurriculos::whereRaw($filtro)->get();

                return Datatables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action', function($row) {
                                    $btn = '<a href="/admin/curriculo/' . $row->id . '" class="edit btn btn-primary btn-sm">Verificar</a>';
                                    return $btn;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
            }
        } else {
            return redirect('/');
        }
    }

    public function curriculo($id) {
        $data = \App\Models\VwCurriculos::where('id', $id)->first();
        $user = User::where('id',$data->users)->first();
        return View("admin.curriculo", ["data" => $data, "user" => $user]);
    }

    public function upperAdmin($id) {
        $data = User::find($id);
        $data->current_team_id = !$data->current_team_id;
        $data->save();
    }
}
