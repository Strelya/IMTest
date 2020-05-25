@extends('layouts.app')

@section('content')
<header><h3 class="tabs_involved">Продукт {{$product->name}} (ID: {{$product->id}})</h3></header>

@php ($one_img = DB::table('product_images')->where('id_product', $product->id)->pluck('name')->first())
<img class="img-responsive shoe-left" src="/product_images/{{$one_img}}"/>

ID товара: {{$product->id}}<br>
@php ($cat_name = DB::table('categories')->where('id', $product->id_category)->pluck('cat_name'))
Категория: {{$cat_name[0]}}<br>
Название: {{$product->name}}<br>
Линк: {{$product->slug}}<br>
Описание: <br>{{$product->descr}}<br>
Цена: <br>{{$product->price}}<br>
<a href="/admin_products/{{$product->id}}/edit"><img src="/images/icn_edit.png" alt="Edit" /></a>
<input type="image" src="/images/icn_trash.png" class="cat_del" data-id="{{$product->id}}"  data-token="{{ csrf_token() }}" title="Trash">

<script>
    jQuery(document).ready(function($) {

        $(".cat_del").click(function(){
            var id = $(this).data("id");
            var token = $(this).data("token");
            var address = document.referrer;

            $.ajax(
                {
                    url: "/admin_products/delete/"+id,
                    type: 'delete',
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": token,
                    },
                });
            document.location.href = address;
        });
    });
</script>
@endsection