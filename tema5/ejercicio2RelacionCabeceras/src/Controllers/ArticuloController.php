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

        // 3. Si es válido, le pedimos el ID limpio al Request y solicitamos la búsqueda al modelo
        $articulo = Articulo::buscarPorId($request->id());

        // 4. Si el artículo solicitado no existe (404 Not Found)
        if ($articulo === null) {
            http_response_code(404);
            $this->pagina->render('articulo/buscar', [
                'articulo' => null,
                'error' => 'Lo sentimos, el artículo que estás buscando no existe.'
            ]);
            return;
        }

        // 5. Si todo está correcto, mandamos el 200 OK y pasamos el artículo a la vista
        http_response_code(200);
        $this->pagina->render('articulo/buscar', [
            'articulo' => $articulo,
            'error' => null
        ]);
    }
}
