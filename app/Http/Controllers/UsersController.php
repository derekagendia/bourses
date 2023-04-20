<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Mail\PasswordSent;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    //
    public function index(Request $request,$type)
    {
        if (session('status')) {
            $request->session()->now("status",session('status'));
        }
        if (session('error')) {
            $request->session()->now("error",session('error'));
        }
        $users = User::with('roles','permissions')->get();
        return view('settings.users',['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|unique:users',
            // 'phone' => 'required',
            'permissions' => 'required',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = 1;
        $password = generateRandomString();
        $user->password = password_hash($password,PASSWORD_DEFAULT);
        $user->user_password = $password;
        // if ($request->hasFile('image')) {
        //     $name=randomString(1).".jpg";
        //     $request->file('image')->move(public_path('user-profiles'),$name);

        //     $user->img = $name;
        // }
        $user->save();

        $user->syncPermissions($request->permissions);
        // Log::info('password for '.$user->first_name,['password'=> $password]);
        // send mail to user for password
        // Mail::to($user->email)->locale('fr')->send(new PasswordSent($user->first_name,$password));
        //

        return redirect('/users/admin')->with('status','Utilisateur ajoutee avec succes');

    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 1?0:1;
        $user->save();
        return back()->with('status','statut modifiee avec succes');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return back()->with('status','Supression Reussi');
    }
    public function profile()
    {
        return view('profile',['user' => User::find(auth()->user()->id)]);
    }

    public function updateProfile(Request $request)
    {
        if(User::where('email',$request->email)->count() >1){
            return back()->with('error','Address Mail Existe deja');
        }
        $user = User::find(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        if ($request->password != null) {
            if(!Hash::check($request->old_password,$user->password)){
                return back()->with('error','Mots de passe de correspondent pas');
            }
            if ($request->password != $request->password_confirmation) {
                return back()->with('error','Passwords dont Match');
            }
            $user->password = Hash::make($request->password);
        }
        // dd($request->email);
        $user->save();

        return back()->with('status','Profil Modifie avec success');
    }
}
