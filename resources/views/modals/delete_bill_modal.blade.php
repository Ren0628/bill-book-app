<div class="modal fade" id="deleteBillModal{{ $bill->id }}" tabindex="-1" aria-labelledby="deleteBillModalLabel{{ $bill->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteBillModalLabel{{ $bill->id }}">
                受取日：
                @if(substr($bill->issue_date, 5, 1) === '0')
                    {{ substr($bill->issue_date, 6, 1) }}
                @else
                    {{ substr($bill->issue_date, 5, 2) }}
                @endif
                月
                @if(substr($bill->issue_date, 8, 1) === '0')
                    {{ substr($bill->issue_date, 9, 1) }}
                @else
                    {{ substr($bill->issue_date, 8, 2) }}
                @endif
                日
                「{{ $bill->issuer }} ￥{{ number_format($bill->amount) }}」
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <form action="{{ route('bill.delete', $bill) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        </div>
    </div>
</div>