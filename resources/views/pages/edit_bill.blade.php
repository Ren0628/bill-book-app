
@extends('layouts.app')

@section('title', '手形帳 | 編集')

@section('content')
    <div class="container mt-2">

        <div class="row d-flex justify-content-end">
            <div class="col-1">
                <form action="{{ route('bill.index') }}">
                    <input type="hidden" name="month" value="{{ substr($bill->issue_date, 0, 7) }}">
                    <button class="icon submit_icon" type="submit"><i class="fa-solid fa-file-lines fa-2x"></i></button>
                </form>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bill.update', $bill) }}" method="post">
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="issue_date">受取日</label>
                        <input class="form-control" id="issue_date" type="date" name="issue_date" required value="{{ $bill->issue_date }}">
                    </div>
                    <div class="mb-3 types_of_bills">
                        <div class="form-label">手形種類</div>
                        <div class="d-block">
                            <input class="form-check-input" id="yakute" name="types_of_bills" type="radio" value="yakute" {{ $bill->types_of_bills === 'yakute' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="yakute">約束手形</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="kawate" name="types_of_bills" type="radio" value="kawate" {{ $bill->types_of_bills === 'kawate' ? 'checked' : '' }}>
                            <label class="form-check-label" for="kawate">為替手形</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="densai" name="types_of_bills" type="radio" value="densai" {{ $bill->types_of_bills === 'densai' ? 'checked' : '' }}>
                            <label class="form-check-label" for="densai">電債</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="kogitte" name="types_of_bills" type="radio" value="kogitte" {{ $bill->types_of_bills === 'kogitte' ? 'checked' : '' }}>
                            <label class="form-check-label" for="kogitte">小切手</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="issuer">振出人</label>
                        <input class="form-control" id="issuer" type="text" name="issuer" required value="{{ $bill->issuer }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="receiver">受取人</label>
                        <input class="form-control" id="receiver" type="text" name="receiver" value="{{ $bill->receiver }}">
                    </div>
                </div>
                <div class="col-6 d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="payment_address">支払地</label>
                            <input class="form-control" id="payment_address" type="text" name="payment_address" value="{{ $bill->payment_address }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="payment_place">支払場所</label>
                            <input class="form-control" id="payment_place" type="text" name="payment_place" required value="{{ $bill->payment_place }}">
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="due_date">期日</label>
                            <input class="form-control" id="due_date" type="date" name="due_date" required value="{{ $bill->due_date }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amount">金額</label>
                            <input class="form-control" id="amount" type="text" name="amount" required value="￥{{ number_format($bill->amount) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-success" type="submit">編集</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('/js/create-form.js') }}"></script>
@endsection