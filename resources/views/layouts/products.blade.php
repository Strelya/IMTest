@extends('index')

@section('content')
    <div class="shoes-grid">
    <div class=" w_content">
        <div class="women">
            <h4>{{$category->cat_name}}</h4>
            <ul class="w_nav">
            <li>Сортировка : </li>
            <li><a class="active" href="/categories/{{$category->id}}?sort=sort_name">по имени</a></li> |
            <li>по цене : </li>
            <li><a href="/categories/{{$category->id}}?sort=sort_asc">по возрастанию</a></li> /
            <li><a href="/categories/{{$category->id}}?sort=sort_desc">по убыванию</a></li>
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="product-left">
    @foreach($products as $product)
                <div class="col-md-4 chain-grid">
                    @php ($one_img = DB::table('product_images')->where('id_product', $product->id)->pluck('name')->first())
                    <a href="/product/{{$product->id}}"><img class="img-responsive chain" src="/product_images/{{$one_img}}" alt="{{$product->name}}" /></a>
                    <div class="grid-chain-bottom">
                        <h6><a href="/product/{{$product->id}}">{{$product->name}}</a></h6>
                        <div class="star-price">
                            <div class="dolor-grid">
                                <span class="actual">{{$product->price}}</span>
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
        {{ $products->links() }}
        <div class="clearfix"> </div>
        <h4>Описание категории</h4>
        <p>{{$category->descr}}</p>
        <p>Вебсайт: <a href="{{$category->website}}">{{$category->website}}</a></p>
    </div>
    @endsection