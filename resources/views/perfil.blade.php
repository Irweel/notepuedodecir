@extends('layouts.app')

@section('content')
	
	<div id="container">
		<form enctype = "multipart/form-data" action="{{url('perfil/Auth::id()')}}" method="POST">
			@foreach($users as $user)
				{{ csrf_field() }}
				<div id="imagen" style="display:block; margin-left:680px;margin-bottom: 30px;margin-bottom: 50px;">
					<img src="/images/{{ $user->imagen }}" style="width: 200px;height: 200px;margin-bottom: 20px;border-radius: 100px;margin-left: 50px;">
					<h3 style="font: 20px verdana;color: #6e6e6e;" >ID: {{$user->id}}</h3>
					<h3 style="font: 20px verdana;color: #6e6e6e;" >Nombre: {{$user->name}}</h3>
					<h3 style="font: 20px verdana;color: #6e6e6e;" >Email: {{$user->email}}</h3>
				</div>
				<div style="border-bottom:1px #6e6e6e solid;border-top:1px #6e6e6e solid; width: 60%;margin: auto; padding: 20px;margin-bottom: 100px;">
					<h1 style="color: #181818; padding: 20px 0px 20px 0px;">Editar Informacion:</h1>

					@if($estado == '1')
						<h4 style="border-radius: 10px;border:2px solid #0D9F18;padding: 15px;background: #84CF8A;color: #000; margin-bottom: 40px;">Se actualizo la informacion correctamente!</h4>
					@elseif($estado == '0')
						<h4 style="border-radius: 10px;border:2px solid #B91010;padding: 15px;background: #FF6262;color: #000; margin-bottom: 40px;">Revise los campos que esten completos!</h4>
					@else
						<h4></h4>
					@endif

					<h4 style="font: 18px verdana;color: #6e6e6e;">Nombre:</h4>
					<input type="text" name="nombre" style="margin:10px 0px 20px 0px; width:60%;height:40px;padding:10px;border-radius: 10px;" value="{{$user->name}}">

					<h4 style="font: 18px verdana;color: #6e6e6e;">Email:</h4>
					<input type="text" name="mail" style="margin:10px 0px 20px 0px; width:60%;height:40px;padding:10px;border-radius: 10px;" value="{{$user->email}}">

					<h4 style="font: 18px verdana;color: #6e6e6e;">Imagen:</h4>
					<input type="file" name="image" accept="image/*" style="padding: 10px 0px 20px 0px;">
					<br>
					<input type="submit" name="enviar" value ="Guardar" style="background: #296ABD;color: #fff;border-radius: 7px;width: 400px;height: 50px;margin-left: 270px;margin-top: 20px;margin-bottom: 20px;border-color: black;">
				</div>
			@endforeach
		</form>
		
	</div>
@endsection