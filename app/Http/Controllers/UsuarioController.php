<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario;

class UsuarioController extends Controller
{
	    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	 return Usuario::all();
	}

	 /**
     * Salva um registro recém-criado.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        $usuario = new Usuario;

        $usuario->nome = $request->input('nome');
        $usuario->telefone = $request->input('telefone');
        $usuario->endereco = $request->input('endereco');
        $usuario->save();

        return 'Usuario criado com sucesso com o id ' . $usuario->id;
    }

/**
     * Exibir um registo expecífico.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Usuario::find($id);
    }


    /**
     * Editar um registro específico.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {

        $usuario = Usuario::find($id);

        $usuario->nome = $request->input('nome');
        $usuario->telefone = $request->input('telefone');
        $usuario->endereco = $request->input('endereco');
        $usuario->save();

        return "Usuário #" . $usuario->id . " editado com sucesso.";
    }



	    /**
     * Remover um registro específico.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        $usuario = Usuario::find($id);
        $usuario->delete();

        return "Usuario #" . $id. " excluído com sucesso.";
    }
}
