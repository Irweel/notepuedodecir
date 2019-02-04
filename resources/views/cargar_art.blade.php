@extends('layouts.app')

@section('content')
	<div id="container">
		<form enctype = "multipart/form-data" action="/cargar-articulos/{{Auth::id()}}" method="POST">
			{{ csrf_field() }}
			<div id="main" style="width: 60%; margin-left: 300px; padding: 20px;">
				<img src="/images/{{ $imagen }}" height="250px" width="250" style="border-radius: 20px; margin-left: 350px;margin-bottom: 30px;border:1px solid black;">
				<div id="rellenar" style="border-top: 1px solid black; border-bottom: 1px solid black;margin-bottom: 70px;">
					<h1 style="color: #181818; padding: 20px 0px 20px 0px;">Ingresar Articulo:</h1>

					@if($estado == '1')
						<h4 style="border-radius: 10px;border:2px solid #0D9F18;padding: 15px;background: #84CF8A;color: #000; margin-bottom: 40px;">Se actualizo la informacion correctamente!</h4>
					@elseif($estado == '0')
						<h4 style="border-radius: 10px;border:2px solid #B91010;padding: 15px;background: #FF6262;color: #000; margin-bottom: 40px;">Revise los campos que esten completos!</h4>
					@else
						<h4></h4>
					@endif

					<h4 style="font: 18px verdana;color: #6e6e6e; margin-top: 30px;">Nombre:</h4>
					<input type="text" name="nombre" style="margin:10px 0px 20px 0px; width:60%;height:40px;padding:10px;border-radius: 10px;" value="{{ $name }}">



					<h4 style="font: 18px verdana;color: #6e6e6e;">Descripcion:</h4>
					<input type="text" name="desc" style="margin:10px 0px 20px 0px; width:60%;height:40px;padding:10px;border-radius: 10px;" value="{{ $desc }}">



					<h4 style="font: 18px verdana;color: #6e6e6e;">Imagen:</h4>
					<input type="file" name="image" accept="image/*" style="padding: 10px 0px 20px 0px;">
					
					<input type="submit" name="enviar" value="Guardar" style="background: #296ABD;color: #fff;border-radius: 7px;width: 400px;height: 50px;margin-left: 270px;margin-top: 20px;margin-bottom: 40px;">

					
				</div>
			</div>
		</form>
	</div>
@endsection