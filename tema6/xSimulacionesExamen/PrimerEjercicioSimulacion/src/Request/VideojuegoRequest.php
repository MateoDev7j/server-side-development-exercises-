<?php
declare(strict_types=1);

namespace Request;

class VideojuegoRequest 
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
            $this->datos = [
            'titulo'  => $limpiar($entrada['titulo'] ?? ''),
            'genero' => $limpiar($entrada['genero'] ?? ''), 
            'precio' => (int)($entrada['precio'] ?? 0), 
            ];
    }

    public function validar(): void{
        // Validar titulo
        if ($this->datos['titulo'] === '') {
            $this->errores['titulo'] = "El titulo es obligatorio.";
        } elseif (strlen($this->datos['titulo']) <= 3) {
            $this->errores['titulo'] = "El titulo tiene que tener minimo 4 caracteres.";
        } elseif (str_contains($this->datos['titulo'], ' ')) {
            $this->errores['titulo'] = "El titulo no puede tener espacios en blanco."; // 5
        }
        // Validar genero
        if ($this->datos['genero'] === '') {
            $this->errores['genero'] = "El genero es obligatorio.";
        } elseif (strlen($this->datos['genero']) <= 3) {
            $this->errores['genero'] = "El genero tiene que tener minimo 4 caracteres.";
        } elseif (str_contains($this->datos['genero'], ' ')) {
            $this->errores['genero'] = "El genero no puede tener espacios en blanco.";
        }
        // Validar precio
        if ($this->datos['precio'] <= 0) {
            $this->errores['precio'] = "El precio debe ser mayor que 0.";
        }
        $this->validarImagen();
    }
    /*******************
    **VALIDAR IMAGENES**
    *******************/
    private function validarImagen(): void{
        if (($this->f['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            $this->errores['imagen'] = 'La imagen es obligatoria.';
            return;
        }
        if ($this->f['error'] !== UPLOAD_ERR_OK) {
            $this->errores['imagen'] = 'Error al subir la imagen.';
            return;
        }
        if ($this->f['size'] > 2 * 1024 * 1024) {
            $this->errores['imagen'] = 'La imagen no puede superar 2MB.';
            return;
        }

        $info = @getimagesize($this->f['tmp_name']);
        if ($info === false) {
            $this->errores['imagen'] = 'El archivo no es una imagen válida.';
            return;
        }

        $mimes=[
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp',
        ];
        if(!isset($mimes[$info['mime']])){
            $this->errores['imagen']='Formato no permitido (jpg, png, gif, webp).';
            return;
        }
        $this->extension=$mimes[$info['mime']]; 
    }
    
}