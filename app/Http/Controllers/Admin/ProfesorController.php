<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Models\Przedmiot;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Gate;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesors = Profesor::all();
        return view('admin.profesors.index')->with([
            'profesors' => $profesors,
        ]);;
    }


    public function edit(Profesor $profesor){
        if(Gate::denies('edit-users')){
            return redirect(route('users.home'));
        }

        return view('admin.profesors.edit')->with([
            'profesor' => $profesor
        ]);
    }

    public function update(Request $request, Profesor $profesor)
    {
        $profesor->imieProf = $request->imieProf;
        $profesor->nazwiskoProf = $request->nazwiskoProf;
        if($profesor->save()){
            //$user->students()->where('user_id', $user->id)->update(['imieStudent' => $request->input('imieStudent')]);
            //$user->students()->where('user_id', $user->id)->update(['nazwiskoStudent' => $request->input('nazwiskoStudent')]);
            $request->session()->flash('success', 'Zmiany dla użytkownika ' . $profesor->imieProf. ' zostaly wprowadzone');

        }
        else{
            $request->session()->flash('error', 'Cos poszlo nie tak!');
        }

        return redirect()->route('profesors.index');
    }

    public function create()
    {
        $przedmiots = Przedmiot::all();
        $profesors = Profesor::all();
        return view ('admin.profesors.create')->with([
            'przedmiots' => $przedmiots,
            'profesors' => $profesors
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);


        $role = Role::select('id')->where('name', 'profesors')->first();
        $przedmiot = Przedmiot::select('id')->where('nazwaPrzedmiota','Regulatory')->first();

        $user->roles()->attach($role);
        $user->timestamps = false;

        $profesor = $user->profesors()->create([
            'imieProf' => $data['imieProf'],
            'nazwiskoProf' => $data['nazwiskoProf'],
        ]);
        $profesor->przedmiots()->sync($request->przedmiots);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.students.index'));
        }
        $user->roles()->detach();

        $user->delete();

        return redirect()->route('users.index');
    }
}
