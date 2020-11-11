<div>

  @if(!$orders)
  <div class="text-center">
    <h2>ยังไม่มีรายการสั่งซื้อ ณ สถานะนี้</h2>
  </div>
  @endif

  @foreach($orders as $order)

  @continue($opt == "deliveried" && $order->completed_at != NULL)

  <div class="my-2">
    <div class="d-flex">
      <div class="mr-auto d-flex">
        <img class="mr-1" src="" alt="" style="width: 75px; height: 75px">
        <h3>{{$order->store}}</h3>
      </div>
      <div class="ml-auto">

        @if($opt == "purchasing")
        <div class="text-right">
          <a href="" class="text-right pt-2 btn btn-primary">แจ้งผลชำระเงิน</a>
        </div>
        @elseif($opt == "deliveried")
        <div class="text-right">
          <a href="" class="text-right pt-2 btn btn-primary">ยินยันการรับสินค้า</a>
        </div>
        @endif

        <div class="text-right">
          <p class="mr-1 mb-0">สั่งซื้อเมื่อ {{ $order->order->ordered_at }}</p>

          @if($opt == "purchasing")
          <p class="mr-1 mb-0">หมดอายุเมื่อ {{ $order->order->expired_at }}</p>
          @elseif($opt == "verifying")
          <p class="mr-1 mb-0">ชำระเงินเมื่อ {{ $order->order->purchased_at }}</p>
          @elseif($opt == "verified")
          <p class="mr-1 mb-0">ตรวจสอบแล้วเมื่อ {{ $order->order->verified_at }}</p>
          @elseif($opt == "deliveried")
          <p class="mr-1 mb-0">จัดส่งเมื่อ {{ $order->order->delieveried_at }}</p>
          <h4 class="mr-1 mb-0">เลขพัสดุ {{$order->order->track_id}}</h4>
          @elseif($opt == "cancelled")
          <p class="mr-1 mb-0">จัดส่งเมื่อ {{ $order->order->cancelled_at }}</p>
          @endif
        </div>
      </div>
    </div>

    <table class="my-2 table table-striped">
      @foreach($order->detail as $item)
      <tr>
        <td>
          <img style="width: 75px; height: 75px" src="" alt="">
        </td>
        <td>
          {{ $item->product_name}}
        </td>
        <td class="text-right">
          {{ $item->qty }} ชิ้น
        </td>
        <td class="text-right">
          {{ $item->price}} บาท
        </td>
        @if($opt == "cancelled" || $opt == "history")
        <td class="text-center">
          <a class="btn btn-primary">สั่งซื้ออีกครั้ง</a>
        </td>
        @endif
      </tr>
      @endforeach
    </table>

    <div class="d-flex">
      <h5 class="ml-auto">ราคาทั้งหมด {{$order->order->total_cost}} บาท</h5>
    </div>

    <hr>
  </div>

  @endforeach
</div>
