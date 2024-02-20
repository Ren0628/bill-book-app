@php
    if(session('prev_issue_date')) {
        $set_issue_date = session('prev_issue_date');
    } else {
        $set_issue_date = $today;
    }
@endphp

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('bill.store') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="issue_date">振出日</label>
                        <input class="form-control" id="issue_date" type="date" name="issue_date" required value="{{ $set_issue_date }}">
                    </div>
                    <div class="mb-3">
                        <div class="form-label">手形種類</div>
                        <div class="d-block">
                            <input class="form-check-input" id="yakute" name="types_of_bills" type="radio" value="yakute" required>
                            <label class="form-check-label" for="yakute">約束手形</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="kawate" name="types_of_bills" type="radio" value="kawate">
                            <label class="form-check-label" for="kawate">為替手形</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="densai" name="types_of_bills" type="radio" value="densai">
                            <label class="form-check-label" for="densai">電債</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="issuer">振出人</label>
                        <input class="form-control" id="issuer" type="text" name="issuer" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="receiver">受取人</label>
                        <input class="form-control" id="receiver" type="text" name="receiver">
                    </div>
                </div>
                <div class="col-6 d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="payment_address">支払地</label>
                            <input class="form-control" id="payment_address" type="text" name="payment_address" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="payment_place">支払場所</label>
                            <input class="form-control" id="payment_place" type="text" name="payment_place" required>
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="due_date">期日</label>
                            <input class="form-control" id="due_date" type="date" name="due_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amount">金額</label>
                            <input class="form-control" id="amount" type="number" name="amount" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-success " type="submit">記帳</button>
            </div>
        </form>
    </div>
@endsection