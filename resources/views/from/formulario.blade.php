@extends('layouts.principalfrom')

@section('content')
{!! Form::open(array('id' => 'miform')) !!} 
<br><br>
<div class="form-group">
	{!!Form::label('Selecione uno opción para empezar')!!}
	{!!Form::select('selectop', 
					array('' => 'Seleccione', 'Set' => 'Set/update', 'Query' => 'Query'),
					null, 
					['class' => 'form-control', 'style'  =>'width: 130px', 'id' => 'dropdown']
					)!!}
</div>
<div id="setdiv">
  <div class="form-group">
 {!!Form::label('Set/update:')!!}
 <br>
 	{!!Form::text('set1', null,['id' => 'set1', 'placeholder' => 'x', 'style' => 'width: 130px'])!!}
 	{!!Form::text('set2', null,['id' => 'set2', 'placeholder' => 'y', 'style' => 'width: 130px'])!!}
 	{!!Form::text('set3', null,['id' => 'set3', 'placeholder' => 'z', 'style' => 'width: 130px'])!!}
 	{!!Form::text('set4', null,['id' => 'set4', 'placeholder' => 'w', 'style' => 'width: 130px'])!!}
  </div>
 </div> 
<div id="querydiv">
  <div class="form-group">
 {!!Form::label('Query:')!!}
 <br>
 	{!!Form::text('query1', null,['id' => 'query1', 'placeholder' => 'x1', 'style' => 'width: 130px'])!!}
 	{!!Form::text('query2', null,['id' => 'query2', 'placeholder' => 'y1', 'style' => 'width: 130px'])!!}
 	{!!Form::text('query3', null,['id' => 'query3', 'placeholder' => 'z1', 'style' => 'width: 130px'])!!}
 	{!!Form::text('query4', null,['id' => 'query4', 'placeholder' => 'x1', 'style' => 'width: 130px'])!!}
 	{!!Form::text('query5', null,['id' => 'query5', 'placeholder' => 'y2', 'style' => 'width: 130px'])!!}
 	{!!Form::text('query6', null,['id' => 'query6', 'placeholder' => 'z2', 'style' => 'width: 130px'])!!}
  </div>
 </div> 
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
{!!link_to('#', $title = 'Calcular', $attributes = ['id' => 'boton', 'class' =>'btn btn-default'], $secure =null)!!}

{!! Form::close() !!} 
<div id="respuesta">

</div>


@stop