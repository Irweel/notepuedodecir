@extends('layouts.app')

@section('content')
	<div id="container" style="width: 80%;margin: auto;border: 1px solid #181818;background: lightgrey;border-radius: 10px;padding: 10px;padding-bottom: 30px;margin-bottom: 100px;">
		<h1 style="color: #181818; padding: 20px 0px 20px 0px;font-family:verdana;">Inventario:</h1>
		<a href="/cargar-articulos/{{Auth::id()}}" style="border:1px solid black;padding: 20px 100px 20px 100px; font:20px verdana; color: #fff; border-radius: 10px;background: #51AB59;margin-left: 460px;">Cargar Articulo</a>
		<br><br><br>
		@foreach($articulos as $art)
			<div id="articulos" style="margin-left:250px; margin-bottom: 30px;border: 1px solid black;width: 60%;border-radius: 20px;background: #ECECEC;padding: 15px 0px 10px 0px;">

				<div id="encabezado" style="padding: 20px;">
					<h4 style="display: inline-block;margin-left: 50px;font: 18px verdana;color: #6e6e6e">Id: {{$art->id}}</h4>
					<h4 style="display: inline-block;margin-left: 50px;font: 18px verdana;color: #6e6e6e;">Nombre: {{$art->name}}</h4>
				</div>


				<div id="cuerpo" style="padding: 20px;margin-left: 50px;">
					<img src="/images/{{$art->image}}" style="display: inline-block; width: 230px;border-radius: 10px;border:3px solid #6F6F6F; padding: 5px">
					<div style="display: inline-block;float: right;margin-right: 60px;">
						<h4 style="font-family:verdana;color: #6e6e6e;">Descripcion:</h4>
						<p style="border: 1px solid black; width: 330px;height: 195px;background: #fff;color: black;font:12px verdana;padding: 10px;border-radius: 5px;">{{$art->description}}</p>
					</div>
					<form enctype = "multipart/form-data" action="/inventario/{{Auth::id()}}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="hidden" value="{{$art->id}}">
						<input type="submit" name="eliminar" value="Eliminar" style="width: 50%;margin-left: 150px;margin-top: 20px;margin-bottom: 20px;padding: 15px;border-radius: 10px;background: #296ABD;color: #fff;border-color: black;font:16px verdana;cursor: pointer;">
					</form>
				</div>
				
			</div>
		@endforeach
		
	</div>
@endsection