@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')
    @if ($featured)
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="row mb-2">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">{{ $featured->amount }}</h1>
                    <p class="lead my-3">{{ Str::limit($featured->notes, 50, ' ...') }}</p>
                    <p class="lead mb-0">
                        <a href="{{ route('transactions.show', $featured) }}" class="text-white fw-bold">
                            Continue reading...
                        </a>
                    </p>
                </div>
            </div>
        </div>
    @endif
    {{-- transactions Card --}}
    <div class="row mb-2">
        @forelse ($transactions as $transaction)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">{{ $transaction->amount }}</h3>
                        <div class="mb-1 text-muted">{{ $transaction->type }}</div>
                        <div class="mb-1 text-muted">{{ $transaction->category }}</div>
                        <div class="mb-1 text-muted">{{ $transaction->created_at }}</div>
                        <div class="mb-1 text-muted">{{ $transaction->updated_at }}</div>
                        <p class="card-text mb-auto">{{ Str::limit($transaction->notes, 30, ' ...') }}</p>
                        <a href="{{ route('transactions.show', $transaction) }}" class="stretched-link">Continue
                            reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        @if ($transaction->image)
                            <img src="{{ $transaction->image_url }}" alt="image" width="200" height="250">
                        @else
                            <img src="https://via.placeholder.com/200x250" width="200" height="250">
                        @endif
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No transactions found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $transactions->links() }}
    </div>
@endsection
