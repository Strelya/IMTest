@extends('layouts.app')

@section('content')
<header><h3 class="tabs_involved">Редактирование категории - {{$category->cat_name}} (ID: {{$category->id}})</h3></header>

{!! Form::open(array('method' => 'PATCH', 'route' => 'category_update', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('cat_name', 'Название:') !!}
    {!! Form::text('cat_name', $category->cat_name, array('required',
              'class'=>'form-control',
              'placeholder'=>'Название новой категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Линк:') !!}
    {!! Form::text('slug', $category->slug, array('required',
              'class'=>'form-control',
              'placeholder'=>'Линк категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('descr', 'Описание:') !!}
    {!! Form::textarea('descr', $category->descr, array(
              'class'=>'form-control',
              'placeholder'=>'Описание категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('website', 'Вебсайт:') !!}
    {!! Form::text('website', $category->website, array(
              'class'=>'form-control',
              'placeholder'=>'Вебсайт производителя')) !!}
</div>
{{ Form::hidden('id_cat', $category->id) }}
<div class="form-group">
    {!! Form::submit('Сохранить изменения',
      array('class'=>'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
    @endsection