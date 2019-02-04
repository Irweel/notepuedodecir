<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articulos = DB::select("call ub.mostrarTodosArt()");
        $users = DB::select("call ub.mostrarTodosUsers()");

        return view('home',compact('articulos','users'));
    }
    public function buscarArt(Request $request)
    {
        $texto = $request->input('texto');
        


        if ($texto != null) {
            $articulos = DB::select("call ub.buscarArt(?)",[$texto]);
            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }
        else{
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }

        
    }





    public function showPerfil($id)
    {
        $users = DB::select("call ub.mostrar_usuarios(?)",[Auth::id()]);
        
        
        if ($id != Auth::id()) {
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }
        else{
            $estado = 2;
            return view('perfil',compact('users','estado'));
        }
        
    }
    public function actualizar(Request $request)
    {
        $name = $request->input('nombre');
        $mail = $request->input('mail');
       

        if ($name != null && $mail != null && $request->hasFile('image')) {
            
            $id = Auth::id();

            $image = $request->file('image');
            $imagen = $id.'_'.$image->getClientOriginalName(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagen);


            DB::select("call ub.actualizarUsuarios(?,?,?,?);",[$name,$mail,$imagen,$id]);

            

            $users = DB::select("call ub.mostrar_usuarios(?)",[Auth::id()]);
            $estado = 1;
            return view('perfil',compact('users','estado'));
        }
        else{
            $estado = 0;
            $users = DB::select("call ub.mostrar_usuarios(?)",[Auth::id()]);
            return view('perfil',compact('users','estado'));    
        }
        
        

    }










     public function showIntercambio($id)
    {
        
        if ($id != Auth::id()) {
            $articulos = DB::select("call ub.mostrarTodosArt()");

            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }
        else{
            $intercambio = DB::select("call ub.mostrarIntercambioPorIdUser(?);",[Auth::id()]);
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");

            
            return view('intercambio',compact('intercambio','articulos','users'));
        }

    }
    public function eliminarIntercambio($id,Request $request)
    {
        $id_a_eliminar = $request->input('idaeliminar');

        if ($id_a_eliminar != null) {
            DB::select("call ub.eliminarIntercambio(?,?)",[$id_a_eliminar,Auth::id()]);
            $intercambio = DB::select("call ub.mostrarIntercambioPorIdUser(?);",[Auth::id()]);
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");

                
            return view('intercambio',compact('intercambio','articulos','users'));
        }
        else{
            $intercambio = DB::select("call ub.mostrarIntercambioPorIdUser(?);",[Auth::id()]);
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");

                
            return view('intercambio',compact('intercambio','articulos','users'));
        }
        
        

        

        
        
    }











    public function comentario($id)
    {
        $id_art = $id;

        $articulos = DB::select("call ub.mostarArtPorIdArt(?)",[$id_art]);

        $users = DB::select("call ub.mostrarTodosUsers()");

        $coment = DB::select("call ub.mostrarTodosComent()");
        $id_user_art = DB::select("call ub.mostrarIdUser_porIdArt(?);",[$id_art]);
        

        return view('comentarios',compact('articulos','users','id_art','coment','id_user_art'));
        
    }

    public function enviarComentario($id,Request $request)
    {
        $id_art = $id;
        $mensaje = $request->input('mensaje');

        $articulos = DB::select("call ub.mostarArtPorIdArt(?)",[$id_art]);
        $users = DB::select("call ub.mostrarTodosUsers()");

        $coment = DB::select("call ub.mostrarTodosComent()");

        $id_user_art = DB::select("call ub.mostrarIdUser_porIdArt(?);",[$id_art]);



        if ($mensaje != null) {
           DB::select("call ub.insertarComentario(?, ?,?);",[Auth::id(),$id_art,$mensaje]);
           $coment = DB::select("call ub.mostrarTodosComent()");

            return view('comentarios',compact('articulos','users','id_art','coment','id_user_art'));
        }else{
            return view('comentarios',compact('articulos','users','id_art','coment','id_user_art'));
        }

        
    }















    public function gestionarIntercambio($id)
    {
        $id_from = Auth::id();
        $id_to = $id;
        
        if ($id == Auth::id()) {
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }
        else{
            $articulos_to = DB::select("call ub.mostrarArticulos(?)",[$id]);
            $articulos_from = DB::select("call ub.mostrarArticulos(?)",[$id_from]);

            $user_to = DB::select("call ub.mostrar_usuarios(?);",[$id]);
            $user_from = DB::select("call ub.mostrar_usuarios(?)",[$id_from]);

            $estado = 0;
            return view('gestionarintercambio',compact('articulos_to','articulos_from','id_to','user_from','user_to','estado'));
        }
    }

    public function intercambiar($id, Request $request)
    {
        $id_from = Auth::id();
        $id_to = $id;

        $inputfrom = $request->input('art1');
        $inputto = $request->input('art2');
        $estado = 0;

        if ($inputfrom != null && $inputto != null) {
            DB::select("call ub.insertarIntercambio(?,?,?,?)",[$id_from,$id_to,$inputfrom,$inputto]);
            
            $intercambio = DB::select("call ub.mostrarIntercambioPorIdUser(?);",[Auth::id()]);
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");

            
            return view('intercambio',compact('intercambio','articulos','users'));
        }else{
            $estado = 1;
            


            $articulos_to = DB::select("call ub.mostrarArticulos(?)",[$id_to]);
            $articulos_from = DB::select("call ub.mostrarArticulos(?)",[$id_from]);

            $user_to = DB::select("call ub.mostrar_usuarios(?);",[$id_to]);
            $user_from = DB::select("call ub.mostrar_usuarios(?)",[$id_from]);


            return view('gestionarintercambio',compact('articulos_to','articulos_from','id_to','user_from','user_to','estado'));
        }

        
        
    }






    public function mostrarArt($id)
    {
        $ids = Auth::id();
        if ($id != $ids) {
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }
        else{
            $imagen = 'articulodefault.jpg';
            $name = '';
            $desc = '';
            $estado = 2;

            return view('cargar_art',compact('imagen','name','desc','estado'));
        }
    }
    public function agregarArt(Request $request)
    {
        $id = Auth::id();
        $name = $request->input('nombre');
        $desc = $request->input('desc');
        $estado = 0;
        

        if ($name != null && $desc != null && $request->hasFile('image')) {

            $image = $request->file('image');
            $imagen = $id.'_'.$image->getClientOriginalName(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagen);
            $estado = 1;
            DB::select("call ub.insertarArt(?,?,?,?);",[$name,$desc,$imagen,$id]);

            return view('cargar_art',compact('imagen','name','desc','estado'));
        }
        else{
            $imagen = 'default.png';
            return view('cargar_art',compact('imagen','name','desc','estado'));
        }
        
    }







     public function showInventario($id)
    {
        $articulos = DB::select("call ub.mostrarArticulos(?)",[Auth::id()]);
        if ($id != Auth::id()) {
            $articulos = DB::select("call ub.mostrarTodosArt()");
            $users = DB::select("call ub.mostrarTodosUsers()");
            return view('home',compact('articulos','users'));
        }
        else{
            return view('inventario',compact('articulos'));
        }

    }
    public function eliminarArt(Request $request)
    {
        $id = Auth::id();
        $hidden = $request->input('hidden');
        DB::select("call ub.eliminarArt(?, ?);",[$hidden,$id]);

        $articulos = DB::select("call ub.mostrarArticulos(?)",[Auth::id()]);
        return view('inventario',compact('articulos'));
        
    }


}





































