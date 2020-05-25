@extends('layouts.app')

@section('content')
<header><h3 class="tabs_involved">Редактирование карточки продукта - {{$product->name}} (ID: {{$product->id}})</h3></header>
@php ($images = DB::table('product_images')->where('id_product', $product->id)->pluck('name'))
<div>
@foreach($images as $img)
        <img style="float:left; max-width: 200px" src="/product_images/{{$img}}" />
@endforeach
</div>
{!! Form::open(array('method' => 'PATCH', 'route' => 'product_update', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', $product->name, array('required',
              'class'=>'form-control',
              'placeholder'=>'Название новой категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Линк:') !!}
    {!! Form::text('slug', $product->slug, array('required',
              'class'=>'form-control',
              'placeholder'=>'Линк категории')) !!}
</div>
@php ($categories = DB::table('categories')->select('id', 'cat_name')->get())
<div class="form-group">
    <select name="id_category" class='form-control'>
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $product->id_category) selected @endif>{{$category->cat_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('descr', 'Описание:') !!}
    {!! Form::textarea('descr', $product->descr, array(
              'class'=>'form-control',
              'placeholder'=>'Описание продукта')) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Цена:') !!}
    {!! Form::text('price', $product->price, array('required',
              'class'=>'form-control',
              'placeholder'=>'Цена')) !!}
</div>
{{ Form::hidden('id_prod', $product->id) }}
<div class="form-group">
    {!! Form::submit('Сохранить изменения',
      array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
    @endsection