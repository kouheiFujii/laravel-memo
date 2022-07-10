@extends('layouts.app')

@section('content')
<div class="card" >
    <div class="card-header">新規メモ</div>
    <form class="card-body" action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="メモを入力"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">新規メモ</button>
    </form>
</div>
@endsection
