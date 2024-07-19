@extends('layouts.app')

@section('content')
<div class="container ambot">
    {{-- <h1>Billing Statement</h1> --}}
    <h2>{{ $student->fname }} {{ $student->lname }}</h2>
    <h3>Section: {{ $account->section }}</h3>

    <div id="billing-content">
        @include('billing.partials.billing_content', compact('account', 'charges', 'payments'))
    </div>
</div>
@endsection
