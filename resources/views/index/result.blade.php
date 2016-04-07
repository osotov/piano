@extends('master')

@section('content')
    <div class="page-header">
        <h1>StackExchange search</h1>
    </div>
    <form class="form-inline">
        <div class="form-group">
            <label class="sr-only" for="query">Search string</label>
            <input type="text" class="form-control" id="query" placeholder="enter search phrase" name="query" value="{{ $query }}">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div id="result-list">
        @if (count($issuesList) > 0)
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
                @foreach($issuesList as $key => $issue)
                    @if ($issue->is_answered)
                        <tr class="success">
                    @else
                        <tr>
                    @endif
                        <td>{{ $key + 1 }}</td>
                        <td>{{ Carbon\Carbon::createFromTimestamp($issue->creation_date)->toDateTimeString() }}</td>
                        <td><a href="{{ $issue->link }}">{{ $issue->title }}</a></td>
                        <td>{{ $issue->owner->display_name }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-info">There are no results for <strong>{{ $query }}</strong></p>
        @endif
    </div>


@endsection