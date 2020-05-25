@extends('layouts.app')

@section('content')
<header><h3 class="tabs_involved">Создание категории</h3></header>

{!! Form::open(array('method' => 'POST', 'route' => 'category_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('cat_name', 'Название:') !!}
    {!! Form::text('cat_name', null, array('required',
              'class'=>'form-control',
              'placeholder'=>'Название новой категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Линк:') !!}
    {!! Form::text('slug', null, array('required',
              'class'=>'form-control',
              'placeholder'=>'Линк категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('descr', 'Описание:') !!}
    {!! Form::textarea('descr', null, array(
              'class'=>'form-control',
              'placeholder'=>'Описание категории')) !!}
</div>
<div class="form-group">
    {!! Form::label('website', 'Вебсайт:') !!}
    {!! Form::text('website', null, array('required',
              'class'=>'form-control',
              'placeholder'=>'Вебсайт производителя')) !!}
</div>
<div class="form-group">
    {!! Form::submit('Создать категорию',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
    @endsection