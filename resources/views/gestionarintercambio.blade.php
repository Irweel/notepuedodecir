

@extends('layouts.app')

@section('content')
	<style type="text/css">
		#id{background: green;}
	</style>

    <div id="container" style="width: 90%;margin: auto;border-radius: 10px;padding: 10px;padding-bottom: 100px;margin-bottom: 100px;">

        <h1 style="color: #181818; padding: 20px 0px 20px 20px;font-family:verdana;margin-left: 20px;border: 1px solid #181818;background: #FFDA8A;border-radius: 10px;">Intercambio:</h1>
        @if($estado == '1')
			<h4 style="border-radius: 10px;border:2px solid #B91010;padding: 15px;background: #FF6262;color: #000; margin-bottom: 30px;width: 80%;margin-left: 127px;">Revise los campos que esten completos!</h4>
		@else
			<h4></h4>
		@endif


        <form enctype = "multipart/form-data" action="/gestionar-intercambio/{{$id_to}}" method="POST">

	        <div style="margin:auto;width: 100%;border-radius: 10px;margin-bottom: 20px;">
	        	<div id="user1" style="float: left;">
	        		<table style="margin-left: 10px;">
	        			<tr>
	        				@foreach($user_from as $usrf)
								<td><center><p style="font-family:verdana;">Articulos de {{$usrf->name}}</p></center></td>
							@endforeach
						</tr>
		        		@foreach($articulos_from as $art1)
		        			<tr style="margin-bottom: 20px;">
								<td class="izq" style="border-radius: 10px;background: #DCDCDC; height: 150px;">
									<center>
										<img src="/images/{{$art1->image}}" style="width:80px;border-radius:10px;display: block;padding: 12px 0px 12px 0px;">
										<p style="display: inline-block;font-family:verdana;">{{$art1->name}}</p>
										<input type="radio" value="{{$art1->id}}" name="art1" style="display: inline-block;">
									</center>
								</td>
							</tr>
		        		@endforeach
	        		</table>
	        	</div>


	        	<section id="main" style="padding: 20px 0px 20px 0px;display: inline-block;margin-left: 250px; margin-top: 100px;">

				
						<section id="usuarios">
							<article style="display: inline-block;margin-left: -200px;">
								@foreach($user_from as $usrf)
									<img src="/images/{{$usrf->imagen}}" style="width: 130px; height: 130px;border-radius: 70px;">
									<p style="font-family: verdana;">{{$usrf->name}}</p>
								@endforeach
							</article>
							<article style="display: inline-block;margin-left: 400px;">
								@foreach($user_to as $usrf)
									<img src="/images/{{$usrf->imagen}}" style="width: 130px; height: 130px;border-radius: 70px;">
									<p style="font-family: verdana;">{{$usrf->name}}</p>
								@endforeach
							</article>
						</section>

						<section id="boton">
							
							{{ csrf_field() }}
				            
				            <input type="submit" name="eliminar" value="Intercambiar" style="margin-left: -25px;margin-top: 20px;margin-bottom: 20px;padding: 15px 100px 15px 100px;border-radius: 10px;background: #296ABD;color: #fff;border-color: black;font:16px verdana;cursor: pointer;">
						</section>
				</section>



	        	<div id="user2" style="float: right;display: inline-block;">
	        		<table style="margin-right: 10px;">
	        			<tr>
	        				@foreach($user_to as $usrf)
								<td><center><p style="font-family:verdana;">Articulos de {{$usrf->name}}</p></center></td>
							@endforeach
						</tr>
		        		@foreach($articulos_to as $art1)
		        			<tr>
								<td class="der" style="border-radius: 10px;background: #DCDCDC;height: 150px;">
									<center>
										<img src="/images/{{$art1->image}}" style="width:80px;border-radius:10px;display:block;padding: 12px 0px 12px 0px;">
										<p style="display: inline-block; font-family:verdana;">{{$art1->name}}</p>
										<input type="radio" value="{{$art1->id}}" name="art2" style="display: inline-block;">
									</center>
								</td>
							</tr>
		        		@endforeach
	        		</table>
	        	</div>
	        	
	        </div>

        
         
        </form>
        
        
    </div>
@endsection
