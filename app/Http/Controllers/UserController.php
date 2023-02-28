<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('images', $fileName, 'public');

        $input['password'] = Hash::make($input['password']);
        $input['image'] = 'images/' . $fileName;
        User::create($input);

        return redirect(route('users.index'));
    }

    public function edit($id)
    {
        $user =  User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        User::where('id', $id)->update([
            'name' => $input['name'],
            'email' => $input['email'],
        ]);

        return redirect(url('users'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect(url('users'));
    }
}
