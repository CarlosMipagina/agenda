<?php
use App\Models\Usuario;
use  Illuminate\Http\Request;
use Illuminate\Http\Response;

$app->get('/', function () use ($app) {

    return  redirect('doc/');
});

$app->group(['prefix' => 'api/v1/'], function() use ($app){

    /**
 * @api {get}  /usuarios  lista todos los usuarios 
 * @apiName  ListarUsuarios
 * @apiGroup  usuario
 * @apiExample {curl}  Ejemplo:
 *  curl  -i  http://agendar.dev/api/v1/usuarios
 * @apiError UserNotFound The <code>404</code> El usuario no fue incontrado
 * @apiSuccessExample {json} Success-Response:
 *  HTTP/1.1 200 OK
 *  [
 *       {
 *          "id":1,
 *          "nombre":"Carlos Arturo",
 *          "apellidos":"Gonzalez Alvarez"
 *       }
 *  ]
 * 
*/
$app->get('usuarios/', function () {
    
    
       return (new Response(Usuario::all()))
       ->header('Content-Type','json')
       ->header('Access-Control-Allow-Origin', '*');
        
    });

/**
 * @api {get}  /usuario/:id  lista un usuario 
 * @apiParam {String} [id]   Numero  de documento  del usuario.
 * @apiName  ListarUsuario
 * @apiGroup  usuario
 * @apiExample {curl}  Ejemplo:
 *  curl  -i  http://agendar.dev/api/v1/usuario/id
 * @apiError UserNotFound The <code>404</code> El usuario no fue incontrado
 * @apiSuccessExample {json} Success-Response:
 *  HTTP/1.1 200 OK
 *  [
 *       {
 *          "id":1,
 *          "nombre":"Carlos Arturo",
 *          "apellidos":"Gonzalez Alvarez"
 *       }
 *  ]
 * 
*/
$app->get('usuarios/{ id }', function ( $id ) {
    
    $usuarioFind=Usuario::where('identificacion','=',$id)->first();
   
    if( $usuarioFind !=  null ){

        return (new Response($usuarioFind))
        ->header('Content-Type','json')
        ->header('Access-Control-Allow-Origin', '*');
        
    }else{

        return (new Response("El usuario no incontrado",404))
        ->header('Content-Type','json')
        ->header('Access-Control-Allow-Origin', '*');

    }
    
   
});
     
$app->post('usuarios', function( Request $request ){
    
        $usuario=new Usuario();
    
        if($usuario){
          
            $usuario->nombre            = $request->input('nombre');
            $usuario->apellido          = $request->input('apellido');
            $usuario->identificacion    = $request->input('identificacion');
            $usuario->email             = $request->input('email');
            $usuario->telefono          = $request->input('telefono');
            $usuario->save();
    
            return (new Response("Recurso creado con exito",201))
            ->header('Access-Control-Allow-Origin', '*');
    
        }else{
    
            return (new Response("El recurso no se pude crear",400))
            ->header('Content-Type','json')
            ->header('Access-Control-Allow-Origin', '*');
        }
       
    });


});