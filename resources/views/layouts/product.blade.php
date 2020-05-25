@extends('index')

@section('content')
    <div class=" single_top">
        <div class="single_grid">
            <div class="grid images_3_of_2">
                @php ($images = DB::table('product_images')->where('id_product', $product->id)->pluck('name'))
                <ul id="etalage">
                    @foreach($images as $img)
                    <li>
                            <img class="etalage_thumb_image" src="/product_images/{{$img}}" class="img-responsive" />
                            <img class="etalage_source_image" src="/product_images/{{$img}}" class="img-responsive" title="{{$product->name}}" />
                    </li>
                    @endforeach
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="desc1 span_3_of_2">

                <h4>{{$product->name}}</h4>
                <div class="cart-b">
                    <div class="left-n ">{{$product->price}} грн.</div>
                    <a class="now-get get-cart-in" href="#">Купить</a>
                    <div class="clearfix"></div>
                </div>
                <h6>Появление в продаже: {{$product->date}}</h6>
                <h6>Карточка редактировалась: {{$product->updated_at}}</h6>
                <p>{{$product->descr}}</p>
                <div class="share">
                    <h5>Share Product :</h5>
                    <ul class="share_nav">
                        <li><a href="#"><img src="/images/facebook.png" title="facebook"></a></li>
                        <li><a href="#"><img src="/images/twitter.png" title="Twiiter"></a></li>
                        <li><a href="#"><img src="/images/rss.png" title="Rss"></a></li>
                        <li><a href="#"><img src="/images/gpluse.png" title="Google+"></a></li>
                    </ul>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="toogle">
            <h3 class="m_3">Таблица характеристик</h3>
                @php ($properties_product = DB::table('properties')->where(['id_product' => $product->id])->get())
            <table>
                @foreach($properties_product as $prop)
                <tr>
                    <td>{{ $prop->prop_name }}</td>
                    <td>{{ $prop->prop_value }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="clearfix"> </div>

        @php ($related_products = DB::table('products')->where(['id_category' => $product->id_category])->take(4)->get())
        <ul id="flexiselDemo1">
            @foreach($related_products as $related_product)
                @php ($one_img = DB::table('product_images')->where('id_product', $related_product->id)->pluck('name')->first())
            <li><img src="/product_images/{{$one_img}}" /><div class="grid-flex"><a href="#">{{$related_product->name}}</a><p>{{$related_product->price}} грн.</p></div></li>
            @endforeach
        </ul>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo1").flexisel({
                    visibleItems: 5,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="/js/jquery.flexisel.js"></script>

@endsection