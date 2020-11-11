<div>
  @foreach($orders as $order)

  <div class="my-2">
    <div class="d-flex">
      <div class="mr-auto d-flex">
        <img class="mr-1" src="" alt="" style="width: 75px; height: 75px">
        <h3>{{$order->store}}</h3>
      </div>
      <div class="ml-auto">
        <div class="text-right">
          <a href="" class="text-right pt-2 btn btn-primary">แจ้งผลชำระเงิน</a>
        </div>
        <div class="text-right">
          <p class="mr-1 mb-0">สั่งซื้อเมื่อ {{ $order->order->order_date }}</p>
          <p class="mr-1 mb-0">หมดอายุเมื่อ {{ $order->order->exp_date }}</p>
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
