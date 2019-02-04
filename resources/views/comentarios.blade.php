@extends('layouts.app')

@section('content')
	<div id="container">
		<div style="width: 60%;margin-left: 250px;">
			<h1 style="color: #181818; padding: 20px 0px 20px 0px;font-family:verdana;margin-left: 20px;">Informacion del Articulo:</h1>
		</div>
		@foreach($articulos as $art)
            <div id="articulos" style="margin-left:250px; margin-bottom: 30px;border: 1px solid black;width: 60%;border-radius: 20px;background: #ECECEC; padding: 20px 0px 20px 0px;">

                <div id="encabezado" style="padding: 20px;">
                    @foreach($users as $user)
                        @if($user->id == $art->user_id)
                            <img src="/images/{{$user->imagen}}" style="width: 60px;margin-left: 50px;height: 60px;">
                            <h4 style="display: inline-block;margin-left: 20px;font: 16px verdana;color: #6e6e6e">Dueño: {{$user->name}}</h4>
                        @endif
                    @endforeach

                    <h4 style="display: inline-block;margin-left: 20px;font: 16px verdana;color: #6e6e6e;">Articulo: {{$art->name}}</h4>
                    <a href="/home" style="display: inline-block;margin-left: 30px;">Ir al Home</a>
                </div>


                <div id="cuerpo" style="padding: 20px;margin-left: 50px;margin-bottom: 30px;">
                    <img src="/images/{{$art->image}}" style="display: inline-block; width: 230px;height:230px;border-radius: 10px;border:3px solid #6F6F6F; padding: 5px">
                    <div style="display: inline-block;float: right;margin-right: 60px;">
                        <h4 style="font-family:verdana;color: #6e6e6e;">Descripcion:</h4>
                        <p style="border: 1px solid black; width: 330px;height: 195px;background: #fff;color: black;font:12px verdana;padding: 10px;border-radius: 5px;">{{$art->description}}</p>
                    </div> 
                </div>
            
                
            </div>
        @endforeach


        <div style="width: 60%;margin-left: 250px;">
			<h1 style="color: #181818; padding: 20px 0px 20px 0px;font-family:verdana;margin-left: 20px;">Hacer un Comentario:</h1>
			<form enctype = "multipart/form-data" action="/comentario/{{$id_art}}" method="POST">
				{{ csrf_field() }}
                <input type="text" name="mensaje" style="display: block;padding: 10px;margin:auto;width: 98%;border-radius: 10px;margin-bottom: 30px;">
                <input type="submit" name="comentario" value="Enviar Comentario" style="width: 50%;margin:auto;padding: 15px;border-radius: 10px;background: #296ABD;color: #fff;border-color: black;font:16px verdana;cursor: pointer;display: block;margin-bottom: 40px;width: 98%;">
			</form>

		</div>


		<div style="width: 60%;margin-left: 250px;margin-top: 100px;">
			<h1 style="color: #181818; padding: 20px 0px 20px 0px;font-family:verdana;margin-left: 20px;">Comentarios:</h1>
			@foreach($coment as $com)
				@if($id_art == $com->id_art)
					@foreach($users as $us)
						@if($us->id == $com->id_user)

							@if($us->id != $id_user_art[0]->user_id)
								<div style="display:block;background: #D8D8D8;border-radius: 20px;padding: 10px;border:1px solid black;margin-bottom: 10px;color: #000;">
									<div style="width: 100%;">
										

											<h5>User Name: {{$us->name}}</h5>
											<h5>Mensaje: {{$com->mensaje}}</h5>
										
									</div>
								</div>
							@else
								<div style="display:block;background: #091DA7;border-radius: 20px;padding: 10px;border:1px solid black;margin-bottom: 10px;color: #fff;">
									<div>
										<h5>User Name: {{$us->name}}</h5>
										<h5>Mensaje: {{$com->mensaje}}</h5>
									</div>
								</div>
							@endif
						@endif
					@endforeach
				@endif
			@endforeach
		</div>
	</div>
@endsection



























