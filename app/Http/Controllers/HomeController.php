<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('create');
    }

    // Request -> post されてきた諸々のデータを取得できる
    public function store(Request $request)
    {
        $posts = $request->all();
        // dump dieの略 -> 引数の値を展開して止める（rails の binding.pry） -> 値の確認に使われる
        // dd($posts['content']);
        Memo::insert(['content' => $posts['content'], 'user_id' => \Auth::id()]);

        return redirect(route('home') );
    }
}
