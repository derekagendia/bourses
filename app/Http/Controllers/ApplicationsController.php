<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

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
            'city' => 'required',
            'region' => 'required',
            'first_choice' => 'required',
            'first_choice_center' => 'required',
            'first_choice_location' => 'required',
            'second_choice' => 'required',
            'second_choice_center' => 'required',
            'second_choice_location' => 'required',
            'certificates' => 'required',
            'orientation' => 'required',
            'birth_certificate' => 'required',
            'cni' => 'required',
            'med_certificate' => 'required',
            'stamp' => 'required',
            'picture' => 'required',
        ]);

        $certificates = '';
        $orientation = '';
        $birth_certificate = '';
        $cni = '';
        $med_certificate = '';
        $stamp = '';
        $picture = '';
        if ($request->hasFile('certificates')) {
            $ext = pathinfo($_FILES['certificates']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('certificates')->move(public_path('certificates'),$img_name)){
                $certificates = $img_name;
            }
        }
        if ($request->hasFile('orientation')) {
            $ext = pathinfo($_FILES['orientation']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('orientation')->move(public_path('orientation'),$img_name)){
                $orientation = $img_name;
            }
        }
        if ($request->hasFile('birth_certificate')) {
            $ext = pathinfo($_FILES['birth_certificate']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('birth_certificate')->move(public_path('birth_certificate'),$img_name)){
                $birth_certificate = $img_name;
            }
        }
        if ($request->hasFile('cni')) {
            $ext = pathinfo($_FILES['cni']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('cni')->move(public_path('cni'),$img_name)){
                $cni = $img_name;
            }
        }
        if ($request->hasFile('med_certificate')) {
            $ext = pathinfo($_FILES['med_certificate']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('med_certificate')->move(public_path('med_certificate'),$img_name)){
                $med_certificate = $img_name;
            }
        }
        if ($request->hasFile('stamp')) {
            $ext = pathinfo($_FILES['stamp']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('stamp')->move(public_path('stamp'),$img_name)){
                $stamp = $img_name;
            }
        }
        if ($request->hasFile('picture')) {
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $img_name=generateRandomString().'.'.$ext;
            if($request->file('picture')->move(public_path('picture'),$img_name)){
                $picture = $img_name;
            }
        }

        Application::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'city' => $request->city,
            'region' => $request->region,
            'orientation' => $orientation,
            'certificates' => $certificates,
            'med_certificate' => $med_certificate,
            'birth_certificate' => $birth_certificate,
            'stamp' => $stamp,
            'picture' => $picture,
            'cni' => $cni,
            'pob' => $request->pob,
            'dob' => $request->dob,
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

        if(auth()->user()->picture == null){
            $user = User::find(auth()->user()->id);
            $user->picture = $picture;
            $user->save();
        }
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

    public function downloadPDF($id)
    {
        $application = Application::with('choice_1','choice_2','choice_3',)->find($id);
        if ($application == null) {
            return back()->with('error','Dossier Introuvable');
        }
        $pdf = PDF::loadView('applications.pdf',['application' => $application]);
        return $pdf->download($application->first_name.' '.$application->last_name.' '.$application->created_at.'.pdf');
    }
}
