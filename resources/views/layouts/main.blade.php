@extends('index')

@section('content')
    <div class="shoes-grid">
    @if(isset($rand_products))
        <div class="wrap-in">
            <div class="wmuSlider example1 slide-grid">
                <div class="wmuSliderWrapper">
                    @foreach ($rand_products as $product_slide)
                        <a href="product/{{$product_slide->id}}">
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-matter">
                                    <div class="col-md-5 banner-bag">
                                    @php ($one_img = DB::table('product_images')->where('id_product', $product_slide->id)->pluck('name')->first())                                    <img class="img-responsive " src="product_images/{{$one_img}}" alt=" " />
                                    </div>
                                    <div class="col-md-7 banner-off">
                                        <h2>РАНДОМНАЯ ВЫБОРКА</h2>
                                        <label>{{$product_slide->name}} за <b>{{$product_slide->price}} грн.</b></label>
                                        <p><?php
                                            $descr = substr($product_slide->descr, 0, 200);
                                            $descr = substr($descr, 0, strrpos($descr, ' '));
                                            echo $descr."… ";
                                            ?></p>
                                        <span class="on-get">Переход</span>
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>
                            </article>
                        </a>
                    @endforeach

                </div>
                <ul class="wmuSliderPagination">
                    <li><a href="#" class="">0</a></li>
                    <li><a href="#" class="">1</a></li>
                    <li><a href="#" class="">2</a></li>
                </ul>
                <script src="js/jquery.wmuSlider.js"></script>
                <script>
                    $('.example1').wmuSlider();
                </script>
            </div>
        </div>
        </a>
        <!---->
        <div class="shoes-grid-left">
            @php ($popular_products = DB::table('products')->orderBy('rating', 'desc')->take(4)->get())
            @foreach ($popular_products as $popular_product)
                <a href="product/{{$popular_product->id}}">
                    <div class="col-md-6 con-sed-grid sed-left-top">
                        <div class=" elit-grid">
                            <h4>Блок популярных товаров</h4>
                            <label>{{$popular_product->name}}</label>
                            <p><?php
                                $descr = substr($popular_product->descr, 0, 100);
                                $descr = substr($descr, 0, strrpos($descr, ' '));
                                echo $descr."… ";
                                ?></p>
                            <span class="on-get">Переход</span>
                        </div>
                        @php ($one_img = DB::table('product_images')->where('id_product', $popular_product->id)->pluck('name')->first())
                        <img class="img-responsive shoe-left" src="product_images/{{$one_img}}" alt=" " />

                        <div class="clearfix"> </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="products">
            <h5 class="latest-product">ВСЕ ТОВАРЫ</h5>
            <a class="view-all" href="\pages">ВЫБОРКА<span> </span></a>
        </div>
    @endif
    <div class="product-left">
        <?php
        $latest_products = DB::table('products')->orderBy('updated_at', 'desc')->take(6)->get();
        ?>
        @foreach ($latest_products as $latest_product)
            <div class="col-md-4 chain-grid">
                @php ($one_img = DB::table('product_images')->where('id_product', $latest_product->id)->pluck('name')->first())
                <a href="product/{{$latest_product->id}}"><img class="img-responsive chain" src="product_images/{{$one_img}}" alt=" " /></a>
                <span class="star"> </span>
                <div class="grid-chain-bottom">
                    <h6><a href="product/{{$latest_product->id}}">{{$latest_product->name}}</a></h6>
                    <div class="star-price">
                        <div class="dolor-grid">
                            <?php
                            $proc = mt_rand(4,8);
                            $old_price = $latest_product->price/100*$proc;
                            $old_price = round ($latest_product->price + $old_price);
                            ?>
                            <span class="actual">{{$latest_product->price}}</span>
                            <span class="reducedfrom">{{$old_price}}</span>
                            <span class="rating">
						<input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
						<label for="rating-input-1-5" class="rating-star1"> </label>
						<input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
						<label for="rating-input-1-4" class="rating-star1"> </label>
						<input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
						<label for="rating-input-1-3" class="rating-star"> </label>
						<input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
						<label for="rating-input-1-2" class="rating-star"> </label>
						<input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
						<label for="rating-input-1-1" class="rating-star"> </label>
					</span>
                        </div>
                        <a class="now-get get-cart" href="#">КАРТОЧКА</a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
    @endsection