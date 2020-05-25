@extends('layouts.app')

@section('content')
    <header><h3 class="tabs_involved">Список категорий для проекта</h3></header>

    <div class="tab_container">
        <div class="tab_content">
            <table class="tablesorter" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название категории</th>
                    <th>Ссылка</th>
                    <th>Описание</th>
                    <th>Website</th>
                    <th>Товаров</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($categories as $category)
                    <tr id="tr{{$category->id}}">
                        <td>{{$category->id}}</td>
                        <td><a href="/admin/{{$category->id}}">{{$category->cat_name}}</a></td>
                        <td>{{$category->slug}}</td>
                        <td><?php
                            $descr = substr($category->descr, 0, 100);
                            $descr = substr($descr, 0, strrpos($descr, ' '));
                            echo $descr."… ";
                            ?></td>
                        <td>{{$category->website}}</td>
                        <td>{{App\Products::where(['id_category' => $category->id])->count()}}</td>
                        <td><a href="/admin/{{$category->id}}/edit"><img src="images/icn_edit.png" alt="Edit" /></a></td>
                        <td><input type="image" src="images/icn_trash.png" class="cat_del" data-id="{{$category->id}}" data-token="{{ csrf_token() }}" title="Trash"></td>
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
                            url: "/admin/delete/"+id,
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
    {{ $categories->links() }}
@endsection
