<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function cadastrar(Request $request){
        // dd($request->all());
        
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request['password'])
        ]);

        // Auth::guard()->login($user);
        
        return redirect()->to('/')->with('msg-success','Usuário cadastrado com sucesso!');

    }

    public function realizarLogin(Request $request){
        $dados = $request->validate([
            'email' => 'string',
            'password' => 'required'
        ]);

        
        if(Auth::attempt($dados)){
            return redirect('home');
        }

        return back()->with([
            'msg-error' => 'Ocorreu algum erro.',
        ]);
    }

    public function listarUsuarios(){
        
        $users = User::paginate(5);

        return view('listarUsuario', compact('users'));

    }

    public function edit(Request $request ,$id){
        $user = User::findOrFail($id);        

        return view('editarUsuario', compact('user'));
   
    }

    public function update(Request $request){        
    
        User::findOrFail($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    
        return redirect()->to('/listar')->with('msg-success','Usuário editado com sucesso!');        
    }

    public function __invoke($id){
        User::findOrFail($id)->delete();

        return redirect()->to('/listar');   
    }
}
