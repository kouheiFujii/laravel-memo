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
        $memos = Memo::select('memos.*')
            ->where('user_id', \Auth::id())
            ->whereNull('deleted_at') // Nullでないもの
            ->orderBy('updated_at', 'DESC') // ASC=小さい順（昇順）, DESC=大きい順（降順）
            ->get();

        return view('create', compact('memos') );
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

    public function edit($id)
    {
        $memos = Memo::select('memos.*')
            ->where('user_id', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'DESC')
            ->get();

        $edit_memo = Memo::find($id);

        return view('edit', compact('memos', "edit_memo") );
    }
}
