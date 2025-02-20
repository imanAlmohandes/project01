<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('_users')->get();
        return view('users', compact('users'));
    }

    public function create()
    {
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = bcrypt($_POST['password']);

        DB::table('_users')->insert([
            'name'     => $name,
            'email'    => $email,
            'password' => $password
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        DB::table('_users')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $user  = DB::table('_users')->where('id', $id)->first();
        $users = DB::table('_users')->get();
        return view('users', compact('user', 'users'));
    }

    public function update()
    {
        $id       = $_POST['id'];
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $data = [
            'name'  => $name,
            'email' => $email,
        ];

        if (!empty($password)) {
            $data['password'] = bcrypt($password);
        }

        DB::table('_users')->where('id', $id)->update($data);
        return redirect('users');
    }

}
