@extends('master')

@section('content')
    <div class="page-header">
        <h1>StackExchange search</h1>
    </div>
    <form class="form-inline">
        <div class="form-group">
            <label class="sr-only" for="query">Search string</label>
            <input type="text" class="form-control" id="query" placeholder="enter search phrase" name="query">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
@endsection