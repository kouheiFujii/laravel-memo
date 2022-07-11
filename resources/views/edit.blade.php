@extends('layouts.app')

@section('content')
<div class="card" >
    <div class="card-header">
        メモ編集
        <form action="{{ route('destroy') }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memo['id'] }}" />
            <button type="submit" class="btn btn-secondary">削除</button>
        </form>
    </div>
    <form class="card-body" action="{{ route('update') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <input type="hidden" name="memo_id" value="{{ $edit_memo['id'] }}" />
            <textarea class="form-control" name="content" rows="3" placeholder="メモを入力">{{ $edit_memo['content'] }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
