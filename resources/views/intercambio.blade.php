@extends('layouts.app')

@section('content')
	<div id="container">
		<form enctype = "multipart/form-data" action="/intercambio/{{Auth::id()}}" method="POST" style="width: 90%;margin:auto;">
			{{ csrf_field() }}

			<div id="titulo" style="border:2px solid black; border-radius: 10px;background: #6e6e6e;color: #fff;padding: 15px;margin-bottom: 20px;">
				<h1 style="font-family: verdana; ">Intercambios:</h1>
			</div>

			<div style="width: 100%;padding-top: 20px;padding-bottom: 20px;">
				<h3 style="display: inline-block;">Ingrese el Id del Intercambio que quiera eliminar:</h3>
				<input type="text" name="idaeliminar" style="display: inline-block;width: 200px;border-radius: 10px;padding: 5px;">
				<input type="submit" name="eliminar" value="Eliminar" style="padding: 15px 100px 15px 100px;border-radius: 10px;background: #296ABD;color: #fff;border-color: black;font:16px verdana;cursor: pointer;margin-left: 500px;margin-top: 15px;margin-bottom: 15px;">
			</div>

			<table style="width: 100%;margin:auto;">
				@foreach($intercambio as $int)

					<tr>
						<td>

							<div style="border:2px solid black;border-radius: 10px;background: #EDFFD8;margin-bottom: 20px;">
								<h4 style="padding: 10px;">Id Intercambio: {{$int->id}}</h4>
								<div>
									<div style="width: 49.8%;display: inline-block;border-top: 2px solid black;border-radius: 12px;">

										@foreach($users as $us)
											@if($int->id_user_from == $us->id)
												<div id="user_from" style="display: inline-block;padding: 20px;">
													<img src="/images/{{$us->imagen}}" width="100px" style="display: inline-block;border-radius: 10px;border:1px solid black;height: 100px;">
													<div style="display: inline-block;margin-left: 5px;">
														<h5 style="font: 13px verdana;">Id: {{$us->id}}</h5>
														<h5 style="font: 13px verdana;">Nombre: {{$us->name}}</h5>
														<h5 style="font: 13px verdana;">Mail: {{$us->email}}</h5>
													</div>
												</div>
												
											@else
											@endif
										@endforeach


										@foreach($articulos as $art)
											@if($int->id_art_user_from == $art->id)
												<div id="art_from" style="display: inline-block;padding: 20px;border-right: 2px solid black;border-radius: 10px;float: right;">
													<div style="display: inline-block;">
														<h5 style="font: 13px verdana;">Id: {{$art->id}}</h5>
														<h5 style="font: 13px verdana;">Nombre Art: {{$art->name}}</h5>
													</div>
													<img src="/images/{{$art->image}}" width="100px" style="display: inline-block;border-radius: 10px;border:1px solid black;margin-right: 5px;height: 100px;">
												</div>
												
											@else
											@endif
										@endforeach
									</div>




									<div style="width: 49.8%;display: inline-block;border-top: 2px solid black;border-radius: 12px;">
										@foreach($articulos as $art)
											@if($int->id_art_user_to == $art->id)
												<div id="art_to" style="display: inline-block;padding: 20px;border-left: 2px solid black;border-radius: 10px;">
													<img src="/images/{{$art->image}}" width="100px" style="display: inline-block;border-radius: 10px;border:1px solid black;margin-left: 5px;height: 100px;">
													<div style="display: inline-block;margin-left: 5px;">
														<h5 style="font: 13px verdana;">Id: {{$art->id}}</h5>
														<h5 style="font: 13px verdana;">Nombre Art: {{$art->name}}</h5>
													</div>
													
												</div>
											@else
											@endif
										@endforeach




										@foreach($users as $us)
											@if($int->id_user_to == $us->id)
												<div id="user_to" style="display: inline-block;padding: 20px;float: right;">
													<div style="display: inline-block;">
														<h5 style="font: 13px verdana;">Id: {{$us->id}}</h5>
														<h5 style="font: 13px verdana;">Nombre: {{$us->name}}</h5>
														<h5 style="font: 13px verdana;">Mail: {{$us->email}}</h5>
													</div>
													<img src="/images/{{$us->imagen}}" width="100px" style="display: inline-block;border-radius: 10px;border:1px solid black;height: 100px;">
												</div>
												
											@else
											@endif
										@endforeach
									</div>
									
								</div>

								
							</div>
						</td>
					</tr>
				@endforeach
			</table>
				            
			
		</form>
	</div>
@endsection