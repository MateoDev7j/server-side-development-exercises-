<?php
declare(strict_types=1);
namespace Models;

class RepositorioVideojuegos{
    private const RUTA = BASE_PATH . '/data/videojuegos.json';

    /** @return Videojuego[] */
    public static function todos(): array{
        if(!is_file(self::RUTA)){
            return [];
        }
        $raw=file_get_contents(self::RUTA);
        $datos=json_decode($raw ?: '[]', true);
        if (!is_array($datos)){
            return [];
        }
        return array_map([Videojuego::class, 'fromArray'], $datos);
    }

    public static function buscar(int $id): ?Videojuego
    {
        foreach (self::todos() as $v){
            if ($v->id===$id){
                return $v;
            }
        }
        return null;
    }

    public static function guardar(Videojuego $v):void{
        $lista=array_map(fn(Videojuego $x) => $x->toArray(), self::todos());
        $v->id=empty($lista) ? 1 : max(array_column($lista, 'id')) + 1;
        $lista[]=$v->toArray();
        self::escribir($lista);
    }

    private static function escribir(array $lista):void{
        $dir = dirname(self::RUTA);
        if (!is_dir($dir)){
            mkdir($dir, 0775, true);
        }
        file_put_contents(
            self::RUTA,
            json_encode($lista, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        );
    }
}