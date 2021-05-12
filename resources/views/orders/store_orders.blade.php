<div>
    @foreach($orders as $order)
    <div>
        <h3>หมายเลขสั่งซื้อ: {{$order->order_id}}</h3>
        <p>สั่งซื้อเมื่อ {{\Carbon\Carbon::parse($order->created_at)->timezone('Asia/Bangkok')}}</p>
        @if($order->status == "vaerifying")
        <p>แจ้งชำระเงินเมื่อ: {{\Carbon\Carbon::parse($order->updated_at)->timezone('Asia/Bangkok')}}</p>
        @elseif($order->status == "verified")
        <p>ตรวจสอบการเมื่อ: {{\Carbon\Carbon::parse($order->updated_at)->timezone('Asia/Bangkok')}}</p>
        @elseif($order->status == "cancelled")
        <p>หมดอายุเมื่อ: {{\Carbon\Carbon::parse($order->expired_at)->timezone('Asia/Bangkok')}}</p>
        @else
        <p>อัพเดทล่าสุดเมื่อ: {{\Carbon\Carbon::parse($order->updated_at)->timezone('Asia/Bangkok')}}</p>
        @endif
        <div class="form-inline space-right">
            <a href="{{route('orders.show',['order'=>$order->order_id])}}" class="btn btn-info"> แสดงรายละเอียด</a>
        </div>
    </div>
</div>
<hr>
@endforeach
</div>
