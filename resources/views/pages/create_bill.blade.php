@php
    if(session('prev_issue_date')) {
        $set_issue_date = session('prev_issue_date');
    } elseif($errors->any()) {
        $set_issue_date = old('issue_date');
    } else {
        $set_issue_date = $today;
    }
@endphp

@extends('layouts.app')

@section('content')
    <div class="container mt-2">

        <div class="row d-flex justify-content-end">
            <div class="col-1">
                <a class="icon" href="{{ route('bill.index') }}"><i class="fa-solid fa-file-lines fa-2x"></i></a>
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

        <form action="{{ route('bill.store') }}" method="post">
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="issue_date">受取日</label>
                        <input class="form-control" id="issue_date" type="date" name="issue_date" required value="{{ $set_issue_date }}">
                    </div>
                    <div class="mb-3 types_of_bills">
                        <div class="form-label">手形種類</div>
                        <div class="d-block">
                            <input class="form-check-input" id="yakute" name="types_of_bills" type="radio" value="yakute" {{ old('types_of_bills') === 'yakute' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="yakute">約束手形</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="kawate" name="types_of_bills" type="radio" value="kawate" {{ old('types_of_bills') === 'kawate' ? 'checked' : '' }}>
                            <label class="form-check-label" for="kawate">為替手形</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="densai" name="types_of_bills" type="radio" value="densai" {{ old('types_of_bills') === 'densai' ? 'checked' : '' }}>
                            <label class="form-check-label" for="densai">電債</label>
                        </div>
                        <div class="d-block">
                            <input class="form-check-input" id="kogitte" name="types_of_bills" type="radio" value="kogitte" {{ old('types_of_bills') === 'kogitte' ? 'checked' : '' }}>
                            <label class="form-check-label" for="kogitte">小切手</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="issuer">振出人</label>
                        <input class="form-control" id="issuer" type="text" name="issuer" required value="{{ old('issuer') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="receiver">受取人</label>
                        <input class="form-control" id="receiver" type="text" name="receiver" value="{{ old('receiver') }}">
                    </div>
                </div>
                <div class="col-6 d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="payment_address">支払地</label>
                            <input class="form-control" id="payment_address" type="text" name="payment_address" value="{{ old('payment_address') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="payment_place">支払場所</label>
                            <input class="form-control" id="payment_place" type="text" name="payment_place" required value="{{ old('payment_place') }}">
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="due_date">期日</label>
                            <input class="form-control" id="due_date" type="date" name="due_date" required value="{{ old('due_date') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="amount">金額</label>
                            <input class="form-control" id="amount" type="text" name="amount" required value="{{ old('amount') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-success" type="submit">記帳</button>
            </div>
        </form>
        @if(session('bill'))
        <div class="text-center text-success fs-3">前回入力</div>
        <table  class="bill_table mt-2">
            <thead>
                <tr>
                    <th colspan="2">年</th>
                    <th>手形</th>
                    <th>振出人</th>
                    <th>受取人</th>
                    <th rowspan="2">支払地</th>
                    <th rowspan="2">支払場所</th>
                    <th colspan="13">期日</th>
                    <th rowspan="2">金額</th>
                </tr>
                <tr>
                    <th>月</th>
                    <th>日</th>
                    <th>種類</th>
                    <th>裏書人</th>
                    <th>支払人</th>
                    <th>年</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if(substr(session('bill')->issue_date, 5, 1) === '0')
                            {{ substr(session('bill')->issue_date, 6, 1) }}
                        @else
                            {{ substr(session('bill')->issue_date, 5, 2) }}
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->issue_date, 8, 1) === '0')
                            {{ substr(session('bill')->issue_date, 9, 1) }}
                        @else
                            {{ substr(session('bill')->issue_date, 8, 2) }}
                        @endif
                    </td>
                    <td>
                        @if(session('bill')->types_of_bills === 'kawate')
                            為手
                        @elseif(session('bill')->types_of_bills === 'yakute')
                            約手
                        @elseif(session('bill')->types_of_bills === 'densai')
                            電債
                        @elseif(session('bill')->types_of_bills === 'kogitte')
                            小切手
                        @endif
                    </td>
                    <td>{{ session('bill')->issuer }}</td>
                    <td>{{ session('bill')->receiver }}</td>
                    <td>{{ session('bill')->payment_address }}</td>
                    <td>{{ session('bill')->payment_place }}</td>
                    <td>{{ substr(session('bill')->due_date, 0, 4) - 2018 }}</td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '01')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '02')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '03')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '04')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '05')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '06')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '07')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '08')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '09')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '10')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '11')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr(session('bill')->due_date, 5, 2) === '12')
                            @if(substr(session('bill')->due_date, 8, 1) === '0')
                                {{ substr(session('bill')->due_date, 9, 1) }}
                            @else
                                {{ substr(session('bill')->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td class="px-3">{{ number_format(session('bill')->amount) }}</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
    <script src="{{ asset('/js/create-form.js') }}"></script>
@endsection