<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cadastro;
use App\Models\Siape;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'cpf' => 'required',
            'password' => 'required',
        ]);

        $cpf = Cadastro::where('Cpf_Cadastro',$request->cpf)->first();

        if($cpf == null){
            return redirect('/login');
        }
        if ($cpf->siape->Senha_Siape != $request->password) {
            return redirect('/login');
        }

        if(Auth::loginUsingId($cpf->Id_Cadastro)){
            $request->session()->regenerate();
            return view('dashboard');
        }

        return back()->withErrors([
            'email' => 'As credenciais estão incorretas.',
        ]);*/






        //$modelo = Cadastro::where('Cpf_cadastro',$request->cpf)->get();



         $dados = [
            'email' => $request->email,
            'password' => $request->password
         ];


        if(Auth::attempt($dados)){
            $request->session()->regenerate();
            //dd($request->session()->all());
            return redirect(RouteServiceProvider::HOME);
        }
        return back()->withErrors([
            'email' => 'As credenciais estão incorretas.',
        ]);
        /*$results = DB::connection('conexaoExterna')->table('Cadastro')
        ->join('Siape','Cadastro.Id_Cadastro','=','Siape.Id_Cadastro')
        ->where('Cadastro.Cpf_Cadastro','=',$request->cpf)
        ->where('Siape.Senha_siape','=',$request->password)
        ->get();

        if (count($results)) {
        foreach($results as $result){
            $id = $result->Cpf_Cadastro;
        }
            Auth::loginUsingId($id);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'As credenciais estão incorretas.',
        ]);*/


    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
