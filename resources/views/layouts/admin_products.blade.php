@extends('layouts.app')

@section('content')
    <header><h3 class="tabs_involved">Список продуктов</h3></header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Ссылка</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Рейтинг</th>
                    <th>Добавление</th>
                    <th>Дата редакт.</th>
                    <th>Edit</th>
                    <th>Del</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)
                    <tr id="tr{{$product->id}}">
                        <td>{{$product->id}}</td>
                        @php ($one_img = DB::table('product_images')->where('id_product', $product->id)->pluck('name')->first())
                        <td><img class="img-responsive shoe-left" src="/product_images/{{$one_img}}"/></td>
                        <td><a href="/admin_products/{{$product->id}}">{{$product->name}}</a></td>
                        @php ($cat_name = DB::table('categories')->where('id', $product->id_category)->pluck('cat_name'))
                        <td>{{$cat_name[0]}}</td>
                        <td>{{$product->slug}}</td>
                        <td><?php
                            $descr = substr($product->descr, 0, 100);
                            $descr = substr($descr, 0, strrpos($descr, ' '));
                            echo $descr."… ";
                            ?></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->rating}}</td>
                        <td>{{$product->date}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td><a href="/admin_products/{{$product->id}}/edit"><img src="images/icn_edit.png" alt="Edit" /></a></td>
                        <td><input type="image" src="images/icn_trash.png" class="cat_del" data-id="{{$product->id}}" data-token="{{ csrf_token() }}" title="Trash"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- end of #tab1 -->
        </article>
        <script>
            jQuery(document).ready(function($) {

                $(".cat_del").click(function(){
                    var id = $(this).data("id");
                    var token = $(this).data("token");

                    $.ajax(
                        {
                            url: "/admin_products/delete/"+id,
                            type: 'delete',
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token,
                            },
                            success: function(){
                                $( "#tr"+id ).remove();
                            }
                        });
                });
            });
        </script>
        <div>{{ $products->links() }}</div>

@endsection