@extends('layouts.app')

@section('content')
    <div class="container mt-4"> 
        <table id="bill_table">
            <thead>
                <tr>
                    <th colspan="2">R12年</th>
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
                <tr>
                    <td>12</td>
                    <td>12</td>
                    <td>
                        @if($bill->types_of_bills === 'kawate')
                            為手
                        @elseif($bill->types_of_bills === 'yakute')
                            約手
                        @elseif($bill->types_of_bills === 'densai')
                            電債
                        @endif
                    </td>
                    <td>{{ $bill->issuer }}</td>
                    <td>{{ $bill->receiver }}{{ $bill->issue_date }}</td>
                    <td>{{ $bill->payment_address }}</td>
                    <td>{{ $bill->payment_place }}</td>
                    <td>12</td>
                    <td></td>
                    <td>23</td>
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
                    <td>{{ $bill->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection