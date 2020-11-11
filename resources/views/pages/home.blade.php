@extends('layouts.main')

@section('content')
    <div class="bg-home">
        <div class="container" style="padding-top: 90px;">
            <div style="text-align: center">
                <h1 style="color: white">โปรโมชั่น</h1>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-bottom: 50px">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('storage/pictures/promo1.png')}}" style="height: 400px; width=900" alt="First slide"> 
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="{{asset('storage/pictures/promo2.png')}}" style="height: 400px; width=900" alt="Second slide"> 
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="{{asset('storage/pictures/promo3.png')}}" style="height: 400px; width=900" alt="Third slide"> 
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div style="margin-bottom: 20px;">
                <h2 style="margin-bottom: 10px; text-align: center; color: white">หมวดหมู่สินค้า</h2>
                <div id="between-content" class="d-flex d-flex justify-content-center">
                    @foreach($rec_images as $key=>$image)
                        <div style="background-color: white;" class="p-3" >
                            <img src="{{asset($image)}}">
                            <div style="color: black; padding-top: 20px">
                                <p style="text-align: center">{{$key}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="padding-bottom: 20px">
                <h2 style="margin-bottom: 10px; text-align: center; color: white">ร้านค้าแนะนำ</h2>
                <div class="d-flex justify-content-center">
                    <div class="btn" id="between-content" >
                        <div style="background-color: white;" class="p-3"  >
                        {{-- <a href="{{ route('product_detail') }}"> --}}
                            <img src="{{asset('storage/pictures/korea_shoe.jpg')}}" style="height: 300px"></a>
                            <div style="color: black; padding-top: 20px">
                                <p style="text-align: center; font-weight: bold; font-size: 20px" >RANKA</p>
                                <p style="text-align: center">รองเท้านำเข้าจากเกาหลีคุณภาพดี ราคาถูก ใช้ทน ยางคุณภาพดี มีหลายไซซ์หลากสี</p>
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                    <div class="btn" id="between-content">
                        <div style="background-color: white;" class="p-3" >
                            <img src="{{asset('storage/pictures/koreashirt.jpeg')}}" style="height: 300px">
                            <div style="color: black; padding-top: 20px">
                                <p style="text-align: center; font-weight: bold; font-size: 20px" >RAN-KAI-WA</p>
                                <p style="text-align: center">เสื้อผ้านำเข้าจากเกาหลี เนื้อผ้าคุณภาพ ราคาเหมาะสม</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn" id="between-content">
                        <div style="background-color: white;" class="p-3" >
                            <img src="{{asset('storage/pictures/koreatrousers.jpeg')}}" style="height: 300px">
                            <div style="color: black; padding-top: 20px">
                                <p style="text-align: center; font-weight: bold; font-size: 20px" >RAN-DI-CHON-AENG</p>
                                <p style="text-align: center">กางเกงนำเข้าจากเกาหลีมีหลายไซซ์ คุณภาพดี เนื้อผ้าใส่สบาย ใส่ได้หลายโอกาส</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
