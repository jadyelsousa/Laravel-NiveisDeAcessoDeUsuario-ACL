<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function loginView(){

            return view('teste.logintest');

            #return view('teste\logintest',['results' => $results]);

    }

    public function loginPost(Request $request){
        $results = DB::connection('conexaoExterna')->table('Cadastro')
        ->join('Siape','Cadastro.Id_Cadastro','=','Siape.Id_Cadastro')
        ->where('Cadastro.Cpf_Cadastro','=',$request->cpf)
        ->where('Siape.Senha_siape','=',$request->senha)
        ->first();

        if ($results) {

            Auth::loginUsingId($results->Id_Cadastro);
            dd(Auth::check());
            return view('teste.homepage',compact('results'));



        }
        else{
        return redirect()->back()->withErrors([
            'Dados incorretos'
        ]);
        }
           /* if ($results) {
            foreach($results as $result){
                $id = $result->Cpf_Cadastro;
            }
                Auth::loginUsingId($id);
                $request->session()->regenerate();
                return redirect('/dashboard');
            }*/}

        function logout()
        {
            Auth::logout();
            return redirect('/connection');

        }

}
