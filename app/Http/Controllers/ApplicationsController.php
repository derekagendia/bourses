<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    //
    public function __invoke()
    {
        # code...
    }
    public function index()
    {
        if(!auth()->user()->hasAnyPermission(['manage_applications','manage_scolarships','manage_users'])){
            return view('applications.index',['applications' => Application::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get()]);
        }else{
            return view('applications.index',['applications' => Application::with('user')->orderBy('created_at','DESC')->get()]);
        }
    }

    public function create()
    {
        return view('applications.apply');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'first_choice' => 'required',
            'first_choice_center' => 'required',
            'first_choice_location' => 'required',
            'second_choice' => 'required',
            'second_choice_center' => 'required',
            'second_choice_location' => 'required',
            'candidature' => 'required',
            'orientation' => 'required',
        ]);

        $candidature = '';
        $orientation = '';
        if ($request->hasFile('candidature')) {
            $ext = pathinfo($_FILES['candidature']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('candidature')->move(public_path('candidature'),$img_name)){
                $candidature = $img_name;
            }
        }
        if ($request->hasFile('orientation')) {
            $ext = pathinfo($_FILES['orientation']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('orientation')->move(public_path('orientation'),$img_name)){
                $orientation = $img_name;
            }
        }

        Application::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'orientation' => $orientation,
            'candidature' => $candidature,
            'first_choice' => $request->first_choice,
            'first_choice_center' => $request->first_choice_center,
            'first_choice_location' => $request->first_choice_location,
            'second_choice' => $request->second_choice,
            'second_choice_center' => $request->second_choice_center,
            'second_choice_location' => $request->second_choice_location,
            'third_choice' => $request->second_choice,
            'third_choice_center' => $request->second_choice_center,
            'third_choice_location' => $request->second_choice_location,
            'status' => 0,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/applications')->with('status','Demande Enregistre avec success');
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);
        $application = Application::find($request->id);
        if ($application == null) {
            return back()->with('error','Demande Inconnu');
        }

        $application->status = $request->status;
        $application->save();
        return redirect('/applications')->with('status','Statut modifie avec success');
    }

    public function edit($id)
    {
        return view('applications.edit',['application' => Application::with('choice_1','choice_2','choice_3')->find($id)]);
    }
}
