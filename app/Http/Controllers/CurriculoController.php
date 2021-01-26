<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Curriculo;
use App\Models\Cidades;
use App\Models\AreasInteresse;
use App\Models\Escolaridades;
use App\Models\User;
use App\Models\Idiomas;
use App\Models\IdiomasNivel;
use App\Models\CurriculoIdioma;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CurriculoController extends Controller {

    public $dados;
    public $cidade;

    public function show() {

        $id = Auth::id();
        $data = \App\Models\VwCurriculos::where('users', $id)->first();
        $user = User::where('id', $id)->first();
        view()->share('user', $user);
        $cidade = Cidades::where('ativo', 1)->orderBy('idcidade')->orderBy('cidadenome','asc')->get();
        $interesse = AreasInteresse::where('ativo', 1)->orderBy('areainteressenome', 'asc')->get();
        $escolaridade = Escolaridades::where('ativo', 1)->orderBy('idescolaridade', 'asc')->get();
        $idioma = \App\Models\Idiomas::where('ativo', 1)->get();
        $idiomanivel = \App\Models\IdiomasNivel::where('ativo', 1)->get();

        

        if (isset($data->id)) {
            $cur_idiomas = CurriculoIdioma::where('curriculo_id', '=', $data->id)->get();
            if (count($cur_idiomas) == 0) {
                $cur_idiomas = new CurriculoIdioma();
                $cur_idiomas->curriculo_id = $data->id;
                $cur_idiomas->idioma_id = 0;
                $cur_idiomas->nivel_id = 0;
                $cur_idiomas->save();
            }
            $cur_idiomas = CurriculoIdioma::where('curriculo_id', '=', $data->id)->get();
        } else {
            $data = new Curriculo();
            $data->idioma_id = 0;
            $data->users = Auth::id();
            $data->save();
            $data = \App\Models\VwCurriculos::where('users', $id)->first();
            $cur_idiomas = new CurriculoIdioma();
            $cur_idiomas->curriculo_id = $data->id;
            $cur_idiomas->idioma_id = 0;
            $cur_idiomas->nivel_id = 0;
            $cur_idiomas->save();
            $cur_idiomas = CurriculoIdioma::where('curriculo_id', '=', $data->id)->get();
        }
        
       // $data->pretensao = str_pad($data->pretensao,5,0,STR_PAD_LEFT);
//        if (intval($data->pretensao)==$data->pretensao) {
//            $data->pretensao .=",00";
//        }
//        if (floatval(str_replace(",",".",$data->pretensao)) - intval($data->pretensao) >0 ) {
//            $centavos = $data->pretensao - intval($data->pretensao);
//            if (strlen(round($centavos,2))==3) {
//                $data->pretensao .="0";
//            }
//        }
        
        //print_r($data);
        return View("curriculo", [
            "dados" => $data,
            "user" => $user,
            'cidade' => $cidade,
            'interesse' => $interesse,
            'escolaridade' => $escolaridade,
            'idioma' => $idioma,
            'idiomanivel' => $idiomanivel,
            'cur_idiomas' => $cur_idiomas
        ]);
    }

    public function update(Request $request) {
        $curriculo = Curriculo::where('users', Auth::id())->first();
        $arquivo = "";
        if (isset($request->curriculo)) {
            $file = $request->file('curriculo');
            $destinationPath = 'curriculos';
            $arquivo = Storage::disk("public")->put("curriculos/" . $curriculo->id, $request->file("curriculo"));

            if (Storage::disk("public")->exists($curriculo->curriculo))
                Storage::disk("public")->delete($curriculo->curriculo);
        }

//         if ($arquivo != "" && $curriculo->arquivo != $arquivo) {
//            $curriculo->update([
//                'curriculo' => $arquivo,
//            ]);
//        }

        $curriculo = Curriculo::where('users', Auth::id());
        

        $cnh = "";
        if (isset($request->cnh)) {
            foreach ($request->cnh as $est) {
                $cnh .= $est . ",";
            }
        }
        if ($arquivo != "") {
            $curriculo->update([
                'curriculo' => $arquivo,
            ]);
        }


        $curriculo->update([
            'telefone' => $request->telefone,
            'whatsapp' => $request->whatsapp,
            'pcd' => isset($request->pcd) && $request->pcd == "1" ? 1 : 0,
            'estagio' => isset($request->estagio) && $request->estagio == "1" ? 1 : 0,
            'cnh' => $cnh,
            'nascimento' => $request->nascimento,
            'pretensao' => str_replace("_",'',str_replace("R$ ",'',str_replace(",",'.',str_replace(".",'',$request->pretensao)))),
            'cidade_id' => $request->cidade,
            'cidade_nome' => $request->cidade_nome,
            'idade' => $request->idade,
            'areainteresse_id' => $request->area_interesse,
            'areainteresse_nome' => $request->area_interesse_nome,
            'experiencia' => $request->area_interesse_experiencia,
            'escolaridade_id' => $request->escolaridade,
            'idioma_nome' => $request->idioma_outra,
        ]);

        $curriculo = Curriculo::where('users', Auth::id())->first();

        DB::table('curriculo_idioma')->where('curriculo_id', $curriculo->id)->delete();

        if (isset($request->idioma)) {
            foreach ($request->idioma as $idioma) {
                $curriculoIdioma = new CurriculoIdioma();
                $nivel = "idiomanivel_" . $idioma;

                $curriculoIdioma->curriculo_id = $curriculo->id;
                $curriculoIdioma->idioma_id = $idioma;
                $curriculoIdioma->nivel_id = $request->$nivel;

                $curriculoIdioma->save();
            }
        }
        return redirect('curriculo')
                        ->with('success', 'Curriculo atualizado com sucesso...');
    }

}
