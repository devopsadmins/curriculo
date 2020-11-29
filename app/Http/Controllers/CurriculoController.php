<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Curriculo;


class CurriculoController extends Controller {

    public function show($id_logado = '') {
        if (Auth::user()->current_team_id == 1)
            return redirect('admin');
        return View('curriculo');
    }

    public function edit($id_logado = '') {
        
         if (Auth::user()->current_team_id == 1)
             return redirect('admin');
        
        $id_logado = Auth::id();
        $model = Curriculo::where('users', auth()->id())->get();

        return View('curriculo', ['id' => $id_logado, 'dados' => $model]);
    }

    public function update(Request $request, $id) {
        $curriculo = Curriculo::findOrfail($id);
        $curriculo->update([
            'nome_curriculo' => $request->nome,
            'email_curriculo' => $request->email,
            'telefone' => $request->telefone,
            'profissao' => $request->profissao,
            'experiencia' => $request->experiencia,
            'idioma' => $request->idioma,
            'site' => $request->site,
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'linguagens' => $request->linguagens,
        ]);

        return redirect()->route('curriculo.index')
                        ->with('success', 'Curriculo atualizado com sucesso...');
    }

}
