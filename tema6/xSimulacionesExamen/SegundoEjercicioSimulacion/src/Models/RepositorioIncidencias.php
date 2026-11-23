<?php
declare(strict_types=1);
namespace Models;

class RepositorioIncidencias{

    private static function ruta(): string{
    return BASE_PATH . 'data/incidencias.json';
}
    /** @return Incidencia[] */
    public static function todos(): array{
        if(!is_file(self::ruta())){
            return [];
        }
        $raw=file_get_contents(self::ruta());
        $datos=json_decode($raw ?: '[]', true);
        if (!is_array($datos)){
            return [];
        }
        return array_map([Incidencia::class, 'fromArray'], $datos);
    }

    public static function buscar(int $id): ?Incidencia
    {
        foreach (self::todos() as $v){
            if ($v->id===$id){
                return $v;
            }
        }
        return null;
    }

    public static function guardar(Incidencia $v):void{
        $lista=array_map(fn(Incidencia $x) => $x->toArray(), self::todos());
        $v->id = empty($lista) ? 1 : max(array_column($lista, 'id')) + 1;
        $lista[]=$v->toArray();
        self::escribir($lista);
    }

    private static function escribir(array $lista):void{
        $dir = dirname(self::ruta());
        if (!is_dir($dir)){
            mkdir($dir, 0775, true);
        }
        file_put_contents(
            self::ruta(),
            json_encode($lista, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        );
    }
}