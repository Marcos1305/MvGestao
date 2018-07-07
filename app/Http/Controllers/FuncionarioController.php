<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NovoFuncionarioRequest;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function profile()
    {
        $funcionario = auth()->user();
        return view('Admin.Func.profile',compact('funcionario'));
    }

    public function novaSenha()
    {
        return view('Admin.Func.newpass');
    }

    public function salvarSenha(request $request)
    {
        if(auth()->user()->name == 'Teste')
            return redirect()->back()->with('error', 'Ação não permitida para usuário teste');
        if(!(Hash::check($request->get('atual'), Auth()->user()->password)))
            return redirect()->back()->with("error", "Senha atual incorreta");

        if(strcmp($request->get('atual'), $request->get('newPassword')) == 0)

            return redirect()->back()->with('error', 'Nova senha deve ser diferente da atual.');

        $validateData = $request->validate([
            'atual' => 'required',
            'newPassword' => 'required|min:5|confirmed',
            'newPassword_confirmation' => 'required:min:5'
        ]);
        $user = Auth()->user();
        $user->password = bcrypt($request->get('newPassword'));
        $novaSenha = $user->save();

        if($novaSenha)
            return redirect()->back()->with('success', 'Senha alterada com sucesso!');
    }

    public function novoFuncionario()
    {
        $this->authorize('admin');
        return view('Admin.Func.novo');
    }

    public function salvarFuncionario(NovoFuncionarioRequest $request, Funcionario $funcionario)
    {
        $this->authorize('admin');
        $request->cpf = preg_replace("/[^0-9]/", "", $request->cpf);
        $funcionario->name              = $request->name;
        $funcionario->cpf               = $request->cpf;
        $funcionario->email             = $request->email;
        $funcionario->cargo             = $request->cargo;
        $funcionario->DataDeNascimento  = $request->DataDeNascimento;
        $funcionario->DataDeContratacao = $request->DataDeContratacao;
        $funcionario->Supervisor        = $request->Supervisor;
        $funcionario->password          = bcrypt($request->password);

        $save = $funcionario->save();
        $funcionario->endereco()->create($request->all());

        if(!$save)
            return redirect()->back()->with('error', 'Erro ao cadadastrar funcionario.');

        return redirect()->back()->with('success', "Funcionario {$funcionario->name} cadastrado com sucesso!");

    }
    public function listaFuncionario(Funcionario $funcionario)
    {
        $this->authorize('admin');
        $funcionarios = Funcionario::with('endereco')->get();
        return view('Admin.Func.lista', compact('funcionarios'));
    }

}
