<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function update($idPost)
    {

        $post = Post::find($idPost);
        $this->authorize('update-post',$post);
        return view('update-post',compact('post'));

    }
    public function rolesPermissions()
        {
            $nameUser = auth()->user()->name;
            echo("<h1>{$nameUser}</h1>");

            foreach (auth()->user()->roles as $role) {
                echo "$role->name ->";

                $permissions = $role->permissions;
                foreach($permissions as $permission)
                {
                    echo "$permission->name, ";
                }

               echo '<hr>';

            }
        }

    public function indexPermission(){
        $users = User::with('roles')->get();
        $roles = Role::get();
        $this->authorize('admin');
        return view('register-permission', compact('users','roles'));

        // $users = User::find(1);
        // foreach($users->roles as $role){
        //     $name=$role->pivot->user_id;
        // }

        // dd($name);
    }



    public function storePermission(Request $request){
        if ($request->check_role) {
            $users = User::with('roles')->get();
            foreach($users as $user){
                if(empty($request->check_role[$user->id])){
                    $user->roles()->detach();
                }
                else{
                    $user->roles()->sync($request->check_role[$user->id]);
                }

            }

                return redirect('dashboard')->with('status', 'Permissões salvas com sucesso');
        }
    }

    public function search(Request $request){

        $posts = Post::where('title', 'LIKE',"%{$request->search}%")->orWhere('description', 'LIKE',"%{$request->search}%")->paginate();
        return view('dashboard',compact('posts'));


    }

}
