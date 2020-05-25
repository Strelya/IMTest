@extends('layouts.app')

@section('content')
<header><h3 class="tabs_involved">Создание карточки продукта</h3></header>

{!! Form::open(array('method' => 'POST', 'route' => 'product_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, array('required',
              'class'=>'form-control',
              'placeholder'=>'Название товара')) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Линк:') !!}
    {!! Form::text('slug', null, array('required',
              'class'=>'form-control',
              'placeholder'=>'Линк категории')) !!}
</div>
@php ($categories = DB::table('categories')->select('id', 'cat_name')->get())
<div class="form-group">
    <select name="id_category">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->cat_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('descr', 'Описание:') !!}
    {!! Form::textarea('descr', null, array(
              'class'=>'form-control',
              'placeholder'=>'Описание категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Цена:') !!}
    {!! Form::text('price', null, array('required',
              'class'=>'form-control',
              'placeholder'=>'Цена')) !!}
</div>
<div class="form-group">
    {!! Form::submit('Создать категорию',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
    @endsection