@extends('pages::main')

@section('content')
    <article class="article">
        <h1 class="title">{{ $page->title }}</h1>
        <div class="body">
            {!! $page->body !!}
        </div>
    </article>
@endsection