<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Przedmiot;
use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    use RegistersUsers;

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
        $students = Student::all();
        return view('admin.students.index')->with([
            'students' => $students,
        ]);;
    }

    public function edit(Student $student){
        if(Gate::denies('edit-users')){
            return redirect(route('users.home'));
        }

        return view('admin.students.edit')->with([
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $student->imieStudent = $request->imieStudent;
        $student->nazwiskoStudent = $request->nazwiskoStudent;
        if($student->save()){
            //$user->students()->where('user_id', $user->id)->update(['imieStudent' => $request->input('imieStudent')]);
            //$user->students()->where('user_id', $user->id)->update(['nazwiskoStudent' => $request->input('nazwiskoStudent')]);
            $request->session()->flash('success', 'Zmiany dla użytkownika ' . $student->imieStudent. ' zostaly wprowadzone');

        }
        else{
            $request->session()->flash('error', 'Cos poszlo nie tak!');
        }

        return redirect()->route('students.index');
    }

    public function create()
    {
        $przedmiots = Przedmiot::all();
        $students = Student::all();
        return view ('admin.students.create')->with([
            'przedmiots' => $przedmiots,
            'students' => $students,
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


        $role = Role::select('id')->where('name', 'user')->first();
        //$przedmiot = Przedmiot::select('id')->where('nazwaPrzedmiota','Regulatory')->first();

        $user->roles()->attach($role);
        $user->timestamps = false;
        $student = $user->students()->create([
            'imieStudent' => $data['imieStudent'],
            'nazwiskoStudent' => $data['nazwiskoStudent'],
        ]);

        $student->przedmiots()->sync($request->przedmiots);

        return redirect()->route('students.index');
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
