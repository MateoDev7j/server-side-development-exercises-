<?php
declare(strict_types=1);
namespace Core;

class Pages
{
    /**
     * Ruta absoluta a la carpeta Views:
     * src/Lib/Pages.php->../../Views/
     */
    private const string VIEWS_DIR = __DIR__ . '/../../Views/';
    /**
     * $pageName es el nombre de nuestra plantilla, por ejemplo, mostrar_todos. No pongas la extensión
     *  $params es el contenedor de las variables que deseamos pasar a la vista.
     * $params es un array con un índice asociativo.
     * Para crear las variables, recorremos la lista y
     * usamos el índice como nombre de variable usando la propiedad variable de PHP ($$name = $value)
     * */
    public function render(string $pageName, ?array $params = null): void
    {
        if ($params !== null) {
            foreach ($params as $name => $value) {
                $$name = $value;
            }
        }
        require self::VIEWS_DIR . 'Layout/header.php';
        require self::VIEWS_DIR . $pageName . '.php';
        require self::VIEWS_DIR . 'Layout/footer.php';
    }
}

