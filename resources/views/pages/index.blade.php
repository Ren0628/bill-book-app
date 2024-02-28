@extends('layouts.app')

@section('title', '手形帳 | 一覧')

@section('content')
    <div class="container mt-2">

        <div class="row d-flex justify-content-between">
            <div class="col-2 mb-2">
                <form id="search_month_form" action="{{ route('bill.index') }}" method="get">
                    <input id="search_month_input" name="month" class="form-control" type="month" value="{{ $month }}">
                </form>
            </div>
            <div class="col-1">
                <a class="icon" href="{{ route('bill.create') }}"><i class="fa-regular fa-pen-to-square fa-2x"></i></a>
            </div>
        </div>

        <table class="bill_table mb-2">
            <thead>
                <tr>
                    <th colspan="2">{{ $wareki }}年</th>
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
                @foreach($bills as $bill)

                @include('modals.delete_bill_modal')

                <tr>
                    <td>
                        @if(substr($bill->issue_date, 5, 1) === '0')
                            {{ substr($bill->issue_date, 6, 1) }}
                        @else
                            {{ substr($bill->issue_date, 5, 2) }}
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->issue_date, 8, 1) === '0')
                            {{ substr($bill->issue_date, 9, 1) }}
                        @else
                            {{ substr($bill->issue_date, 8, 2) }}
                        @endif
                    </td>
                    <td>
                        @if($bill->types_of_bills === 'kawate')
                            為手
                        @elseif($bill->types_of_bills === 'yakute')
                            約手
                        @elseif($bill->types_of_bills === 'densai')
                            電債
                        @elseif($bill->types_of_bills === 'kogitte')
                            小切手
                        @endif
                    </td>
                    <td class="dropdown">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expand="false">
                            {{ $bill->issuer }}
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('bill.edit', $bill) }}">編集</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteBillModal{{ $bill->id }}">削除</a></li>
                        </ul>
                    </td>
                    <td>{{ $bill->receiver }}</td>
                    <td>{{ $bill->payment_address }}</td>
                    <td>{{ $bill->payment_place }}</td>
                    <td>{{ $bill->due_date_wareki }}</td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '01')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '02')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '03')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '04')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '05')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '06')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '07')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '08')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '09')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '10')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '11')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(substr($bill->due_date, 5, 2) === '12')
                            @if(substr($bill->due_date, 8, 1) === '0')
                                {{ substr($bill->due_date, 9, 1) }}
                            @else
                                {{ substr($bill->due_date, 8, 2) }}
                            @endif
                        @endif
                    </td>
                    <td class="px-3">￥{{ number_format($bill->amount) }}</td>
                </tr>
                @endforeach
                @for($i= 0; $i < 20 - count($bills); $i++)
                <tr class="empty_tr">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endfor
            </tbody>
        </table>
        {{ $bills->appends(request()->query())->links() }}
    </div>
    <script src="{{ asset('/js/search-month.js') }}"></script>
@endsection