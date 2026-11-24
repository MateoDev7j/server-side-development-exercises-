<?php
declare(strict_types=1);

namespace Controllers;

use Core\Pages;
use Models\Libro;
use Models\RepositorioLibros;
use Request\LibroRequest;

/** Controlador del modelo Libro. */
final class LibroController
{
    private Pages $pagina;
    function __construct()
    {
        $this->pagina = new Pages();
    }
    /** Muestra el formulario de alta. (YA HECHO) */
    public function create(): void
    {
        new Pages()->render('libro/formulario');
    }

    /** Procesa el alta de un libro. */
    public function store(): void
    {
        // TODO (apartado 4): crear new LibroRequest($_POST, $_FILES).
        //      Si no es válido -> render('libro/formulario') con 'errores' y 'datos', y return.
        //
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('libros/nuevo');
            return;
        }
        $request = new LibroRequest($_POST, $_FILES['portada']);
        if(!$request->esValido()){
            $this->pagina->render('libro/formulario', [
                'libro' => Libro::fromArray($request->datos()),
                'errores'    => $request->errores(),
            ]);
            return;
        }
        // TODO (apartado 5):
        //      1. Generar el nombre único de la imagen (todavía no se mueve).
        //      2. Crear el objeto Libro con ese nombre de portada.
        //      3. Si existe() -> render('libro/formulario') con $errores['general'], y return.
        //      4. Mover la imagen a RUTA_IMG.
        //
        $nombreArchivo = bin2hex(random_bytes(8)) . '.' . $request->extension();
        if (!is_dir(UPLOADS_DIR)){
            mkdir(UPLOADS_DIR,0777,true);
        }
        $movido=move_uploaded_file($request->archivo()['tmp_name'], UPLOADS_DIR . $nombreArchivo);
        if (!$movido) {
        // Si falla, paramos y mostramos el error
        var_dump("ERROR AL MOVER LA IMAGEN");
        var_dump("Origen: " . $request->archivo()['tmp_name']);
        var_dump("¿La carpeta destino existe? " . (is_dir(UPLOADS_DIR) ? 'SÍ' : 'NO'));
        var_dump("¿La carpeta destino tiene permisos de escritura? " . (is_writable(UPLOADS_DIR) ? 'SÍ' : 'NO'));
        exit;
        }
        // TODO (apartado 6):
        //      guardar() -> render('libro/formulario') con 'mensaje' y 'libro'.
        //      Si falla -> borrar la imagen que ya se había movido y mostrar un error.
        $libro = Libro::fromArray($request->datos());
        $libro->portada = $nombreArchivo;
        RepositorioLibros::guardar($libro); 
        

        $this->pagina->render('libro/imprimeFicha',[
            'libro' => $libro,
        ]);
    }

    /** Muestra el catálogo. */
    public function index(): void
    {
        $libros = RepositorioLibros::todos();

        // TODO (apartado 3): rellenar $libros leyendo RUTA_BIBLIOTECA línea por línea
        //      (un array de objetos Libro).
        //este apartado lo hago en la clase RepositorioLibros

        new Pages()->render('libro/catalogo', ['libros' => $libros]);
    }
    function redirect(string $ruta): never
    {
        header('Location: ' . BASE_URL . '/' . ltrim($ruta, '/'));
        exit;
    }
}
