<?php
namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index()
    {
        //$users = DB::table('users')->get();
        $users = User::all();
        $title = 'Listado de usuarios';
//        return view('users.index')
//            ->with('users', User::all())
//            ->with('title', 'Listado de usuarios');
        return view('users.index', compact('title', 'users'));
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function profile()
    {
        $user_auth = Auth::user();
        return view('auth.miperfil', compact('user_auth'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => '',
        ]);
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.show', ['user' => $user]);
    }
    public function destroy(User $user)
    {
        $user->delete();

        if(Input::get('is_ajax') == "ok"){
            return "ok";
        }

        return redirect()->route('users.index');
    }

    }