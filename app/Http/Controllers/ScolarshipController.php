<?php

namespace App\Http\Controllers;


use App\Models\Scolarship;
use Illuminate\Http\Request;

class ScolarshipController extends Controller
{
    //
    public function index($type)
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('settings.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
        ]);

        Scolarship::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'specialty' => $request->specialty,
            'entry_level' => $request->entry_level,
            'exam_type' => $request->exam_type,
            'language' => $request->language,
            'training_period' => $request->training_period,
            'country' => $request->country,
            'description' => $request->description,
            'status' => $request->status == null? 0:1,
        ]);

        return back()->with('status','Bourse enregistre avec success');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
        ]);

        $scolarship = Scolarship::find($request->id);
        if ($scolarship == null) {
            return back()->with('error','Bourse Inconnue');
        }
        $scolarship->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'specialty' => $request->specialty,
            'entry_level' => $request->entry_level,
            'exam_type' => $request->exam_type,
            'language' => $request->language,
            'training_period' => $request->training_period,
            'country' => $request->country,
            'description' => $request->description,
            'status' => $request->status == null? 0:1,
        ]);

        return back()->with('status','Bourse Modifie avec success');
    }

    public function delete($id)
    {
        Scolarship::where('id',$id)->delete();

        return back()->with('status','Bourse Supprime avec success');
    }

}
