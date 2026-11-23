<?php
declare(strict_types=1);
namespace Controllers;

use Lib\Pages;
use Models\Videojuego;                       // 3
use Models\RepositorioVideojuegos;           // 2 (espacio)
use Request\VideojuegoRequest;               // 4
// 1: DirectoryIterator es global, no se importa. Y no lo vamos a usar.

class VideojuegoController
{
    private Pages $pagina;

    function __construct()
    {
        $this->pagina = new Pages();
    }

    public function listaJuegos(): void
    {
        $this->pagina->render('videojuego/lista', [
            'videojuegos' => RepositorioVideojuegos::todos(),
        ]);
    }

    public function nuevoVideojuego(): void
    {
        // 6: pasamos modelo vacío para que la vista pueda rellenar value=""
        $this->pagina->render('videojuego/formulario', [
            'videojuego' => new Videojuego(),
            'errores'    => [],
        ]);
    }

    public function procesar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/videojuego/nuevo');
            return;
        }

        // Tu enfoque, que es el correcto:
        $request = new VideojuegoRequest(
            $_POST['videojuego'] ?? [],   
            $_FILES['imagen'] ?? []
        );

        if (!$request->esValido()) {
            $this->pagina->render('videojuego/formulario', [
                'videojuego' => Videojuego::fromArray($request->datos()),
                'errores'    => $request->errores(),
            ]);
            return;
        }

        $nombreArchivo = bin2hex(random_bytes(8)) . '.' . $request->extension();
        if (!is_dir(UPLOADS_DIR)){
            mkdir(UPLOADS_DIR,0777,true);
        }
        move_uploaded_file($request->archivo()['tmp_name'], UPLOADS_DIR . $nombreArchivo);
        
        $videojuego = Videojuego::fromArray($request->datos());
        $videojuego->imagen = $nombreArchivo;
        RepositorioVideojuegos::guardar($videojuego);

        $this->redirect('/videojuego/lista');
    }

    public function detalle(string $id): void 
    {
        $videojuego = RepositorioVideojuegos::buscar((int)$id);
        if ($videojuego === null) {
            \Controllers\ErrorController::show_error404();
            return;
        }
        $this->pagina->render('videojuego/detalle', ['videojuego' => $videojuego]);
    }

    // 5 y 7: sin url(), sin obtenerImagenes()
    function redirect(string $ruta): never
    {
        header('Location: ' . BASE_URL . '/' . ltrim($ruta, '/'));
        exit;
    }
}