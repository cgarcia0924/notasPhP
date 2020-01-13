@extends('plantilla')

@section('seccion')
<h1>Este es nuestro equipo de trabajo</h1>

@foreach($equipo as $item)
	<a href="{{ route('nosotros',$item) }}" class=h4 text-danger>{{$item}} </a><br>
@endforeach

@if(!empty($nombre))
	@switch($nombre)
		@case($nombre=='Ignacio')
		<h2 class="mt-5"> El nombre es {{$nombre}} : </h2>
		<p>{{$nombre}} Lorem ipsum dolor sit amet consectetur</p>
		@break
		@case($nombre=='Carlos')
		<h2 class="mt-5"> El nombre es {{$nombre}} : </h2>
		<p>{{$nombre}} Ingeniero Industrial </p>
		@break
	@endswitch
@endif

@endsection