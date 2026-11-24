<?php
declare(strict_types=1);

namespace Request;

class LibroRequest 
{
    private array $datos = [];
    private array $errores = [];
    private array $f;       
    private string $extension = '';

    public function __construct(array $entrada, array $f){
        $this->f = $f;
        $this->sanear($entrada);
        $this->validar();
    }

    public function esValido(): bool{
        return $this->errores === [];
    }

    public function errores(): array{
        return $this->errores;
    }

    public function datos(): array{
        return $this->datos;
    }
    public function archivo(): array{
        return $this->f; 
    }              
    public function extension(): string{
        return $this->extension; 
    }     
    public function sanear(array $entrada): void{
        $limpiar = static fn(mixed $v): string => is_string($v) ? trim(strip_tags($v)) : '';
        $limpiarArray = static function(mixed $v) use ($limpiar): array {
            if (!is_array($v)) return [];
            return array_filter(array_map($limpiar, $v));
        };

            $this->datos = [
            'titulo'  => $limpiar($entrada['titulo'] ?? ''),
            'autor' => $limpiar($entrada['autor'] ?? ''), 
            'genero' => $limpiar($entrada['genero'] ?? ''),
            'anio' => (int)$limpiar($entrada['anio'] ?? 0),
            'paginas' => (int)($entrada['paginas'] ?? 0),
            
            ];
    }
    public function validar(): void{
        // Validar titulo
        if ($this->datos['titulo'] === '') {
            $this->errores['titulo'] = "El titulo es obligatorio.";
        } elseif (strlen($this->datos['titulo']) <= 3) {
            $this->errores['titulo'] = "El titulo tiene que tener minimo 4 caracteres.";
        }
        //Validar autor
        if ($this->datos['autor'] === '') {
            $this->errores['autor'] = "El autor es obligatorio.";
        } elseif (strlen($this->datos['autor']) <= 3) {
            $this->errores['autor'] = "El autor tiene que tener minimo 4 caracteres.";
        }
        //validar genero
        if ($this->datos['genero'] === '') {
            $this->errores['genero'] = "El genero es obligatorio.";
        }
        //validar anio
        if($this->datos['anio'] <= 0){
            $this->errores['anio'] = "El año debe ser mayor que 0.";
        }
        //validar paginas
        if($this->datos['paginas']<= 0){
            $this->errores['paginas'] = "Las paginas debe ser mayor que 0.";
        }
        $this->validarPortada();
    }
    /*******************
    **VALIDAR IMAGENES**
    *******************/
    private function validarPortada(): void{
        if (($this->f['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            $this->errores['portada'] = 'La imagen es obligatoria.';
            return;
        }
        if ($this->f['error'] !== UPLOAD_ERR_OK) {
            $this->errores['portada'] = 'Error al subir la imagen.';
            return;
        }
        if ($this->f['size'] > 2 * 1024 * 1024) {
            $this->errores['portada'] = 'La imagen no puede superar 2MB.';
            return;
        }

        $info = @getimagesize($this->f['tmp_name']);
        if ($info === false) {
            $this->errores['portada'] = 'El archivo no es una imagen válida.';
            return;
        }

        $mimes=[
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp',
        ];
        if(!isset($mimes[$info['mime']])){
            $this->errores['portada']='Formato no permitido (jpg, png, gif, webp).';
            return;
        }
        $this->extension=$mimes[$info['mime']]; 
    }
    
}