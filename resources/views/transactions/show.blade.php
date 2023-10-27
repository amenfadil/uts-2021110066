@extends('layouts.template')

@section('title', $transaction->amount)

@section('content')
    <div class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->amount }}</h1>
        <p class="blog-post-meta">{{ $transaction->created_at }}</p>
        <p class="blog-post-meta">{{ $transaction->type }}</p>
        <p class="blog-post-meta">{{ $transaction->category }}</p>
        <p>{{ $transaction->notes }}</p>
        <p class="blog-post-meta">{{ $transaction->updated_at }}</p>
    </div>
@endsection
