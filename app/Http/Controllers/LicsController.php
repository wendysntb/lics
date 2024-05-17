<?php

namespace App\Http\Controllers;

use App\Models\Lics;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Session;

class LicsController extends Controller
{
    public function index(): View
    {
        $lics = lics::all();
        return view('index', compact('lics'));
    }

    public function create(request $request )
    {
        $lics = $request->all();

        lics::create($lics);

        return back()->with('create', 'Criado com Sucesso!');
    }

    public function edit(request $request, $id)
    {
        $lics = lics::find($id);

        $lics->update([
            'nu_fase' => $request['nu_fase'],
            'nu_edital' => $request['nu_edital'],
            'modalidade' => $request['modalidade'],
            'data_abertura' => $request['data_abertura'],
            'nome_licitador' => $request['nome_licitador'],
            'cnpj_licitador' => $request['cnpj_licitador'],
            'prioridade' => $request['prioridade'],
            'objeto' => $request['objeto'],
        ]);

        return back()->with('message', 'Editado com Sucesso!');

    }

    public function delete($id)
    {
        $lics = lics::find($id);

        $lics->delete();
        
        return back()->with('delete', 'Deletado com Sucesso!');
    }
}
