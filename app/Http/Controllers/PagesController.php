<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
   
  public function inicio(){
      // se guarda todo lo que se trae de la tabla notas con las siguientes lineas
        $notas = App\Nota::paginate(5);
         return view('welcome', compact('notas'));
    }
  
    public function detalle($id){
        // $nota = App\Nota::find($id);
        //Aquí valida si existe sino redirije al 404
        $nota = App\Nota::findOrFail($id);

        return view('notas.detalle', compact('nota'));
    }
    
    public function crear(Request $request){
       // return $request->all(); // PARA VERIFICAR 
      
      // con el request validate ponemos todos los campos que queremos validar.
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
      
        $notaNueva = new App\Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();
        return back()->with('mensaje', 'Nota agregada');
    

    }
  
    public function editar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }
  
    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
      
      $notaupdate = App\Nota::find($id);
      $notaupdate->nombre = $request->nombre;
      $notaupdate->descripcion = $request->descripcion;
      $notaupdate->save();
      return back()->with('mensaje', 'Nota editada!');

  }
  
  public function eliminar($id){
    $notaeliminar = App\Nota::find($id);
    $notaeliminar->delete();
    return back()->with('mensaje', 'Nota Eliminada!');

  }
  
  
  public function fotos(){
         return view('fotos');
    }
         
  public function blog(){
         return view('blog');
    }  
    
  public function nosotros($nombre=null){
        $equipo = ['Ignacio', 'Carlos', 'Tatiana'];
        //return view('nosotros', ['equipo'=>$equipo,'nombre'=>$nombre]);
        return view('nosotros', compact('equipo','nombre'));
    }   
  
}
