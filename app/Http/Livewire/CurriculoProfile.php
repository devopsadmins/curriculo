<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculo;
use App\Models\Cidades;
use \App\Models\AreasInteresse;
use \App\Models\Escolaridades;

class CurriculoProfile extends Component {

    public $dados;
    public $cidade;

    public function render() {
        $id_logado = Auth::id();
        $this->dados = Curriculo::where('users', auth()->id())->first();
        if (!$this->dados) {
            $curriculo = new Curriculo();
            $users = Auth::id();
            $curriculo->nome=Auth::user()->name;
            $curriculo->email=Auth::user()->email;
            $curriculo->users =Auth::id();
            $curriculo->save();
            
            $this->dados = Curriculo::where('users', auth()->id())->first();
        }
        $this->cidade = Cidades::where('ativo', 1)->get();
        $this->interesse = AreasInteresse::where('ativo', 1)->orderBy('idareainteresse', 'asc')->get();
        $this->escolaridade = Escolaridades::where('ativo', 1)->orderBy('idescolaridade', 'asc')->get();
        $this->idioma = \App\Models\Idiomas::where('ativo', 1)->get();
        $this->idiomanivel = \App\Models\IdiomasNivel::where('ativo', 1)->get();
        return view('livewire.curriculo');
    }

}
