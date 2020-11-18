<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculo;

class CurriculoController extends Controller
{
   public function show($id_logado = '')
    {
     
        return View('curriculo');
    }

     public function edit($id_logado = '')
    {
        $id_logado = Auth::id();
        $model = Curriculo::where('users', auth()->id())->get();
        
        return View('curriculo', ['id' => $id_logado, 'dados' => $model]);
    }
    
    public function update(Request $request, $id)
    {
        $curriculo = Curriculo::findOrfail($id);
        $curriculo->update([

            'nome' => $request->nome,
            'email' => $request->email,
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
