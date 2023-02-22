<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class FetchDataController extends Controller
{
    public function fetchData()
    {
        return Post::all();
        // return DB::table('posts')->get();
    }
}
