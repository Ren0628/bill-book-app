<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-langage" content="ja">
        <title>{{ $dateYm }} 受取・支払手形</title>

        <link rel="stylesheet" href="{{ asset('/css/pdf.css') }}">
        <style>
            @font-face{
                font-family: ipag;
                font-style: normal;
                font-weight: normal;
                src:url("{{ storage_path('fonts/ipag.ttf')}}");
            }
        </style>
    </head>
    <body>
        <div class="table_container mt-2">
            <div class="heading">受取手形 {{ $year }}年{{ $lastMonth }}月</div>
            <table class="bill_table mb-2" style="page-break-after: always">
                <thead>
                    <tr>
                        <td class="th th_top border_right" colspan="2">
                            {{ $wareki }}年
                        </td>
                        <td class="th th_top border_bottom_none border_right types_of_bills_th">手形</td>
                        <td class="th th_top border_right issuer_th">振出人</td>
                        <td class="th th_top border_right issuer_th">受取人</td>
                        <td class="th th_mid border_right payment_address_th" rowspan="2">支払地</td>
                        <td class="th th_mid border_right issuer_th" rowspan="2">支払場所</td>
                        <td class="th th_top border_right" colspan="13">期日</td>
                        <td class="amount_th th th_mid" rowspan="2">金額</td>
                    </tr>
                    <tr>
                        <td class="th th_bottom month_th">月</td>
                        <td class="th th_bottom border_right day_th">日</td>
                        <td class="th th_bottom border_top_none border_right">種類</td>
                        <td class="th th_bottom border_right">裏書人</td>
                        <td class="th th_bottom border_right">支払人</td>
                        <td class="due_date_th th">年</td>
                        <td class="due_date_th th">1</td>
                        <td class="due_date_th th">2</td>
                        <td class="due_date_th th">3</td>
                        <td class="due_date_th th">4</td>
                        <td class="due_date_th th">5</td>
                        <td class="due_date_th th">6</td>
                        <td class="due_date_th th">7</td>
                        <td class="due_date_th th">8</td>
                        <td class="due_date_th th">9</td>
                        <td class="due_date_th th">10</td>
                        <td class="due_date_th th">11</td>
                        <td class="due_date_th th border_right">12</td>
                    </tr>
                </thead>
                @if($bills->isNotEmpty())
                <tbody>
                    @foreach($bills as $bill)
                    <tr>
                        <td>
                            @if(substr($bill->issue_date, 5, 1) === '0')
                                {{ substr($bill->issue_date, 6, 1) }}
                            @else
                                {{ substr($bill->issue_date, 5, 2) }}
                            @endif
                        </td>
                        <td class="border_right">
                            @if(substr($bill->issue_date, 8, 1) === '0')
                                {{ substr($bill->issue_date, 9, 1) }}
                            @else
                                {{ substr($bill->issue_date, 8, 2) }}
                            @endif
                        </td>
                        <td class="border_right">
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
                        <td class="border_right">
                            @if(mb_convert_kana($bill->issuer, 'n') != '1')
                            {{ $bill->issuer }}
                            @endif
                        </td>
                        <td class="border_right">{{ $bill->receiver }}</td>
                        <td class="border_right">{{ $bill->payment_address }}</td>
                        <td class="border_right">{{ $bill->payment_place }}</td>
                        <td class="border_right">{{ $bill->due_date_wareki }}</td>
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
                        <td class="border_right">
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
                        <td class="border_right">
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
                        <td class="border_right">
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
                        <td class="border_right">
                            @if(substr($bill->due_date, 5, 2) === '12')
                                @if(substr($bill->due_date, 8, 1) === '0')
                                    {{ substr($bill->due_date, 9, 1) }}
                                @else
                                    {{ substr($bill->due_date, 8, 2) }}
                                @endif
                            @endif
                        </td>
                        <td>￥{{ number_format($bill->amount) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            <div class="heading">支払手形 {{ $year }}年{{ $lastMonth }}月</div>
            <table class="bill_table mb-2">
                <thead>
                    <tr>
                        <td class="th th_top border_right" colspan="2">
                            {{ $wareki }}年
                        </td>
                        <td class="th th_top border_bottom_none border_right types_of_bills_th">手形</td>
                        <td class="th th_top border_right issuer_th">振出人</td>
                        <td class="th th_top border_right issuer_th">受取人</td>
                        <td class="th th_mid border_right payment_address_th" rowspan="2">支払地</td>
                        <td class="th th_mid border_right issuer_th" rowspan="2">支払場所</td>
                        <td class="th th_top border_right" colspan="13">期日</td>
                        <td class="amount_th th th_mid" rowspan="2">金額</td>
                    </tr>
                    <tr>
                        <td class="th th_bottom month_th">月</td>
                        <td class="th th_bottom border_right day_th">日</td>
                        <td class="th th_bottom border_top_none border_right">種類</td>
                        <td class="th th_bottom border_right">裏書人</td>
                        <td class="th th_bottom border_right">支払人</td>
                        <td class="due_date_th th">年</td>
                        <td class="due_date_th th">1</td>
                        <td class="due_date_th th">2</td>
                        <td class="due_date_th th">3</td>
                        <td class="due_date_th th">4</td>
                        <td class="due_date_th th">5</td>
                        <td class="due_date_th th">6</td>
                        <td class="due_date_th th">7</td>
                        <td class="due_date_th th">8</td>
                        <td class="due_date_th th">9</td>
                        <td class="due_date_th th">10</td>
                        <td class="due_date_th th">11</td>
                        <td class="due_date_th th border_right">12</td>
                    </tr>
                </thead>
                @if($paybills->isNotEmpty())
                <tbody>
                    @foreach($paybills as $bill)
                    <tr>
                        <td>
                            @if(substr($bill->issue_date, 5, 1) === '0')
                                {{ substr($bill->issue_date, 6, 1) }}
                            @else
                                {{ substr($bill->issue_date, 5, 2) }}
                            @endif
                        </td>
                        <td class="border_right">
                            @if(substr($bill->issue_date, 8, 1) === '0')
                                {{ substr($bill->issue_date, 9, 1) }}
                            @else
                                {{ substr($bill->issue_date, 8, 2) }}
                            @endif
                        </td>
                        <td class="border_right">
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
                        <td class="border_right">
                            @if(mb_convert_kana($bill->issuer, 'n') != '1')
                            {{ $bill->issuer }}
                            @endif
                        </td>
                        <td class="border_right">{{ $bill->receiver }}</td>
                        <td class="border_right">{{ $bill->payment_address }}</td>
                        <td class="border_right">{{ $bill->payment_place }}</td>
                        <td class="border_right">{{ $bill->due_date_wareki }}</td>
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
                        <td class="border_right">
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
                        <td class="border_right">
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
                        <td class="border_right">
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
                        <td class="border_right">
                            @if(substr($bill->due_date, 5, 2) === '12')
                                @if(substr($bill->due_date, 8, 1) === '0')
                                    {{ substr($bill->due_date, 9, 1) }}
                                @else
                                    {{ substr($bill->due_date, 8, 2) }}
                                @endif
                            @endif
                        </td>
                        <td>￥{{ number_format($bill->amount) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
        <script type="text/php">
        if (isset($pdf)) {
            $text = "{PAGE_NUM} / {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("Verdana");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) / 2;
            $y = $pdf->get_height() - 30;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
        </script>
    </body>
</html>
