<?php
declare(strict_types=1);

namespace Request;

class IncidenciaRequest 
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
            'tipo_incidencia'  => $limpiar($entrada['tipo_incidencia'] ?? ''),
            'prioridad' => $limpiar($entrada['prioridad'] ?? ''), 
            'cliente' => $limpiar($entrada['cliente'] ?? ''),
            'descripcion' => $limpiar($entrada['descripcion'] ?? ''),
            'tecnicos' => (int)$limpiar($entrada['tecnicos'] ?? ''),
            'horas' => (float)($entrada['horas'] ?? 0),
            'sistemas' => $limpiarArray($entrada['sistemas'] ?? []),
            'observaciones' => $limpiar($entrada['observaciones'] ?? ''),
            ];
    }
    public function validar(): void{
        // Validar tipo_incidencia
        if ($this->datos['tipo_incidencia'] === '') {
            $this->errores['tipo_incidencia'] = "Debes elegir uno de los 4.";
        } 
        //Validar prioridad 
        if ($this->datos['prioridad'] === '') {
            $this->errores['prioridad'] = "Debes elegir uno de los 4.";
        }
        //validar cliente
        if ($this->datos['cliente'] === '') {
            $this->errores['cliente'] = "El cliente es obligatorio.";
        }elseif (strlen($this->datos['cliente']) <= 3) {
            $this->errores['cliente'] = "El cliente tiene que tener minimo 4 caracteres.";
        } elseif (str_contains($this->datos['cliente'], ' ')) {
            $this->errores['cliente'] = "El cliente no puede tener espacios en blanco."; // 5
        }
        //validar descripcion
        if ($this->datos['descripcion'] === '') {
            $this->errores['descripcion'] = "La descripcion es obligatoria.";
        }elseif (strlen($this->datos['descripcion']) <= 10 && strlen($this->datos['descripcion']) >= 300 ) {
            $this->errores['descripcion'] = "entre 10 y 300 caracteres.";
        } 
        //validar tecnicos
        if($this->datos['tecnicos'] >= 6 || $this->datos['tecnicos'] <= 0){
            $this->errores['tecnicos'] = "Tecnicos debe ser un numero entero entre 1 y 5.";
        }
        //validar horas
        if ($this->datos['horas'] <= 0 || $this->datos['horas'] > 40) {
            $this->errores['horas'] = "Las horas deben ser > 0 y ≤ 40.";
        }
        //validar sistemas
        if($this->datos['sistemas'] ===[] ){
            $this->errores['sistemas'] = "Debes tener almenos uno marcado.";
        }
        //validar observaciones
        if (strlen($this->datos['observaciones']) >= 200 ) {
            $this->errores['observaciones'] = "Maximo 200 caracteres.";
        } 
        
        $this->validarCaptura();
    }
    /*******************
    **VALIDAR IMAGENES**
    *******************/
    private function validarCaptura(): void{
        if (($this->f['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            $this->errores['captura'] = 'La imagen es obligatoria.';
            return;
        }
        if ($this->f['error'] !== UPLOAD_ERR_OK) {
            $this->errores['captura'] = 'Error al subir la imagen.';
            return;
        }
        if ($this->f['size'] > 2 * 1024 * 1024) {
            $this->errores['captura'] = 'La imagen no puede superar 2MB.';
            return;
        }

        $info = @getimagesize($this->f['tmp_name']);
        if ($info === false) {
            $this->errores['captura'] = 'El archivo no es una imagen válida.';
            return;
        }

        $mimes=[
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp',
        ];
        if(!isset($mimes[$info['mime']])){
            $this->errores['captura']='Formato no permitido (jpg, png, gif, webp).';
            return;
        }
        $this->extension=$mimes[$info['mime']]; 
    }
    
}