<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $user = User::all();
        return view('admin.users.index')->with('users', $user);
    }

    public function home()
    {
        return view('admin.users.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('users.index'));
        }
        $roles = Role::all();
        $students = Student::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'students' => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);


        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()){
            $user->students()->where('user_id', $user->id)->update(['imieStudent' => $request->input('imieStudent')]);
            $user->students()->where('user_id', $user->id)->update(['nazwiskoStudent' => $request->input('nazwiskoStudent')]);
            $request->session()->flash('success', 'Zmiany dla użytkownika ' . $user->name . ' zostaly wprowadzone');

        }
        else{
            $request->session()->flash('error', 'Cos poszlo nie tak!');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('users.index'));
        }
        $user->roles()->detach();
        $user->students()->delete();
        $user->profesors()->delete();
        $user->delete();

        return redirect()->route('users.index');
    }
}
