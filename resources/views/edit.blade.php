@extends('layouts.app')

@section('content')
<div class="card" >
    <div class="card-header">メモ編集</div>
    <form class="card-body" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <textarea class="form-control" name="content" rows="3" placeholder="メモを入力">{{ $edit_memo['content'] }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
