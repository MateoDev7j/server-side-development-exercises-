<?php
declare(strict_types=1);
namespace Models;

class RepositorioLibros{

    /** @return Libro[] */
    public static function todos(): array{
        if(!is_file(RUTA_BIBLIOTECA)){
            return [];
        }
        $raw=file_get_contents(RUTA_BIBLIOTECA);
        $datos=json_decode($raw ?: '[]', true);
        if (!is_array($datos)){
            return [];
        }
        return array_map([Libro::class, 'fromArray'], $datos);
    }

    public static function buscar(int $id): ?Libro
    {
        foreach (self::todos() as $v){
            if ($v->id===$id){
                return $v;
            }
        }
        return null;
    }

    public static function guardar(Libro $v):void{
        $lista=array_map(fn(Libro $x) => $x->toArray(), self::todos());
        $v->id = empty($lista) ? 1 : max(array_column($lista, 'id')) + 1;
        $lista[]=$v->toArray();
        self::escribir($lista);
    }

    private static function escribir(array $lista):void{
        $dir = dirname(RUTA_BIBLIOTECA);
        if (!is_dir($dir)){
            mkdir($dir, 0775, true);
        }
        file_put_contents(
            RUTA_BIBLIOTECA,
            json_encode($lista, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        );
    }
}