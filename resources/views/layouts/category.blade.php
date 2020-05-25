@extends('layouts.app')

@section('content')
<header><h3 class="tabs_involved">Категория {{$category->cat_name}} (ID: {{$category->id}})</h3></header>

ID категории: {{$category->id}}<br>
Название: {{$category->cat_name}}<br>
Линк: {{$category->slug}}<br>
Описание: <br>{{$category->descr}}<br>
Линк: {{$category->website}}<br>
<a href="/admin/{{$category->id}}/edit"><img src="/images/icn_edit.png" alt="Edit" /></a>
<input type="image" src="/images/icn_trash.png" class="cat_del" data-id="{{$category->id}}"  data-token="{{ csrf_token() }}" title="Trash">

<script>
    jQuery(document).ready(function($) {

        $(".cat_del").click(function(){
            var id = $(this).data("id");
            var token = $(this).data("token");
            var address = document.referrer;

            $.ajax(
                {
                    url: "/admin/delete/"+id,
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