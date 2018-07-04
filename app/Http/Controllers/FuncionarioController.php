<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class FuncionarioController extends Controller
{
    public function profile()
    {
        $funcionario = auth()->user();
        return view('admin.func.profile',compact('funcionario'));
    }

    public function novaSenha()
    {
        return view('admin.func.newpass');
    }

    public function salvarSenha(request $request)
    {
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

}
