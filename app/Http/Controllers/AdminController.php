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
use Illuminate\Support\Facades\DB;

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

        $id = Auth::id();
        $data = \App\Models\VwCurriculos::where('users', $id)->first();
        $user = User::where('id', $id)->first();
        view()->share('user', $user);

        $this->filtros();

        if (Auth::user()->current_team_id == 1)
            return View("admin.admin", ["dados" => $this]);
        else
            return redirect('curriculo');
    }

    public function perfis() {

        $id = Auth::id();
        $data = \App\Models\VwCurriculos::where('users', $id)->first();
        $user = User::where('id', $id)->first();
        view()->share('user', $user);

        $this->filtros();

        if (Auth::user()->current_team_id == 1)
            return View("admin.admin");
        else
            return redirect('curriculo');
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
            $filtro .= " AND escolaridade_id >= " . $escola;
        if ($idioma != 0) {

            $curIdiomas = \App\Models\CurriculoIdioma::where('idioma_id', $idioma)->get();
            $idiomas = "0";
            if (count($curIdiomas) > 0) {
                foreach ($curIdiomas as $curi) {
                    $idiomas .= "," . $curi->curriculo_id;
                }
            }
            $filtro .= " AND id in (" . $idiomas . ")";
        }
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
        $id2 = Auth::id();
        $data = \App\Models\VwCurriculos::where('users', $id2)->first();
        $users = User::where('id', $id2)->first();
        view()->share('user', $users);

        $data = \App\Models\VwCurriculos::where('id', $id)->first();
        $user = User::where('id', $data->users)->first();
        $idiomas = DB::table('vw_idiomas')->where("curriculo_id", $id)->get();
        return View("admin.curriculo",
                [
                    "data" => $data,
                    "user" => $user,
                    "idiomas" => $idiomas]
        );
    }

    public function upperAdmin($id) {
        $data = User::find($id);
        $data->current_team_id = !$data->current_team_id;
        $data->save();
    }

}
