<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function store()
    {
        // DB::table('users')->insert([
        //     'name' => 'user',
        //     'email' => 'user1@gmail.com',
        //     'password' => 123,
        // ]);

        // User::create([
        //     'name' => 'user',
        //     'email' => 'user3@gmail.com',
        //     'password' => 123,
        // ]);

        return 'data inserted';
    }

    public function update($id)
    {

        // DB::table('users')->where('id', $id)->update([
        //     'name' => 'New User',
        //     'email' => 'user3@gmail.com',
        //     'password' => 123,
        // ]);

        User::where('id', $id)->update([
            'name' => 'user1',
            'email' => 'user13@gmail.com',
            'password' => 123,
        ]);

        return 'data updated';
    }

    public function delete($id)
    {
        // DB::table('users')->where('id', $id)->delete();

        User::where('id', $id)->delete();

        return 'data deleted';
    }

    public function get($id)
    {
    //    return DB::table('users')->where('id', $id)->get();

       return User::where('id', $id)->get();

    }
}
