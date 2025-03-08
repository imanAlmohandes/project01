<?php
namespace App\Http\Controllers;

use App\Models\_user;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // $users = DB::table('_users')->get();
        $users = _user::all();

        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        $user_name = $request->name;
        $user_email = $request->email;
        $user_password = $request->password;


        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'nullable|min:6',
        ]);
        // $user_name     = $_POST['name'];
        // $user_email    = $_POST['email'];
        // $user_password = bcrypt($_POST['password']);

        // DB::table('_users')->insert([
        //     'name'     => $user_name,
        //     'email'    => $user_email,
        //     'password' => $user_password
        // ]);
        $user           = new _user;
        $user->name     = $user_name;
        $user->email    = $user_email;
        $user->password = bcrypt($user_password);
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        // DB::table('_users')->where('id', $id)->delete();
        $user = _user::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        // $user  = DB::table('_users')->where('id', $id)->first();
        // $users = DB::table('_users')->get();
        $user  = _user::findOrFail($id);
        $users = _user::all();
        return view('users', compact('user', 'users'));
    }

    // public function update()
    // {
    //     $id       = $_POST['id'];
    //     $name     = $_POST['name'];
    //     $email    = $_POST['email'];
    //     $password = $_POST['password'];

    //     $data = [
    //         'name'  => $name,
    //         'email' => $email,
    //     ];

    //     if (!empty($password)) {
    //         $data['password'] = bcrypt($password);
    //     }

    //     DB::table('_users')->where('id', $id)->update($data);
    //     return redirect('users');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);
        $user = _user::findOrFail($id);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('users');
    }
}
