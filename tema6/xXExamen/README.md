# Biblioteca del instituto (proyecto base del examen)


Las carpetas `data/` y `public/img/` deben tener permiso de escritura.

## Rutas (ya registradas en `config/routes.php`)

| Método | URL | Acción |
|---|---|---|
| GET | `libros/nuevo` | `LibroController::create()` (hecho) |
| POST | `libros` | `LibroController::store()` (lo escribes tú) |
| GET | `libros` | `LibroController::index()` (lo escribes tú) |

## Ya hecho (no lo modifiques)

`Router`, `Pages`, `autoloader.php`, `bootstrap.php`, la función `e()`, `config/`, las vistas `Layout/` y `libro/formulario.php`,
`public/css/style.css`, `data/biblioteca.txt` (2 libros de ejemplo) y `public/img/` (sus portadas).

## Lo que escribes tú (busca los `TODO`)

- `src/Models/Libro.php`
- `src/Requests/LibroRequest.php`
- `src/Controllers/LibroController.php` (métodos `store()` e `index()`)
- `Views/libro/imprimeFicha.php`
- `Views/libro/catalogo.php`

## Para probar

La carpeta `pruebas/` contiene `portada_ok.jpg` (imagen válida), `portada_grande.jpg` (más de 500 KB) y `no_es_imagen.txt`.
Datos válidos para un alta: Título `Misery`, Autor `Stephen King`, Género `terror`, Año `1987`, Páginas `368`.

El fichero `data/biblioteca.txt` termina con un salto de línea: cada libro nuevo debe añadirse en una línea propia.
