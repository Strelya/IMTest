@extends('index')

@section('content')
    <div class="shoes-grid">
        <div class=" w_content">
            <div class="women">
                <h4>Все товары</h4>
                <ul class="w_nav">
                    <li>Сортировка : </li>
                    <li><a class="active" href="/pages?sort=sort_name">по имени</a></li> |
                    <li>по цене : </li>
                    <li><a href="/pages?sort=sort_asc">по возрастани</a></li> /
                    <li><a href="/pages?sort=sort_desc">по убываниюю</a></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
        </div>
<div class="product-left">
    @foreach ($products as $latest_product)
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
        {{ $products->links() }}
</div>
@endsection

