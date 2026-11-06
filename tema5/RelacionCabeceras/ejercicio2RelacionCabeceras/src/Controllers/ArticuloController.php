<?php
declare(strict_types=1);

namespace Controllers;

use Lib\Pages;
use Models\Articulo;
use Request\ArticuloRequest;

class ArticuloController
{
    private Pages $pagina;

    public function __construct()
    {
        $this->pagina = new Pages();
    }

    /** Muestra el formulario inicial */
    public function index(): void
    {
        $this->pagina->render('articulo/buscar', [
            'articulo' => null,
            'error' => null
        ]);
    }

    /** Procesa la búsqueda delegando en el Request */
    public function buscar(): void
    {
        $request = new ArticuloRequest($_GET);

        //Si no es valido ya sabemos que error http poner y los mensajes de error
        if (!$request->esValido()) {
            http_response_code($request->httpCode()); 
            $this->pagina->render('articulo/buscar', [
                'articulo' => null,
                'error' => $request->error() //Te devuelve el mensaje de error estructurado
            ]);
            return;
        }

        $articulo = Articulo::buscarPorId($request->id());

        if ($articulo === null) {
            http_response_code(404);
            $this->pagina->render('articulo/buscar', [
                'articulo' => null,
                'error' => 'Lo sentimos, el artículo que estás buscando no existe.'
            ]);
            return;
        }

        http_response_code(200);
        $this->pagina->render('articulo/buscar', [
            'articulo' => $articulo,
            'error' => null
        ]);
    }
}
