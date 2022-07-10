@extends('layouts.app')

@section('content')
<div class="card" >
    <div class="card-header">新規メモ</div>
    <form class="card-body" action="/store" method="POST">
        @csrf
        <div class="form-group mb-2">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">新規保存</button>
    </form>
</div>
@endsection
