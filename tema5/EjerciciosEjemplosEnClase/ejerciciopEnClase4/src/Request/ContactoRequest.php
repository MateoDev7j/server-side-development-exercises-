<?php
declare(strict_types=1);

namespace Request;
use finfo;
class ContactoRequest
{
    const TAM_MAX = 2 * 1024 * 1024;
    private array $datos = [];
    private array $errores = [];

    public function __construct(array $entrada)
    {
        $this->sanear($entrada);
        $this->validar();
    }

    public function esValido(): bool
    {
        return $this->errores === [];
    }

    public function errores(): array
    {
        return $this->errores;
    }

    public function datos(): array
    {
        return $this->datos;
    }

    public function sanear(array $entrada): void
    {
        // Función flecha para limpiar strings
        $limpiarText = static fn(mixed $v): string => 
        is_string($v) ? trim(strip_tags($v)) : '';
        
        
        $limpiarEmail = static fn(mixed $v): string => 
        is_string($v) ? filter_var(trim($v), FILTER_SANITIZE_EMAIL): '';


        $limpiarArray = static function(mixed $v) use ($limpiarText): array {
            if (!is_array($v)) return [];
            return array_filter(array_map($limpiarText, $v));
        };
        $this->datos = [
            'nombre'            => $limpiarText($entrada['nombre'] ?? ''),
            'apellidos'         => $limpiarText($entrada['apellidos'] ?? ''),
            'correo'            => $limpiarEmail($entrada['correo'] ?? ''),
            'metodosPago'         => $limpiarArray($entrada['metodosPago'] ?? []),
            'marcar'            => isset($entrada['marcar']), 
            'foto' => $limpiarText($_FILES['foto'] ?? ''),
        ];
    }

    public function validar(): void
    {
        //validar correo
        if ($this->datos['correo'] === '') {
            $this->errores['correo'] = "El correo es obligatorio.";
        } elseif (!filter_var($this->datos['correo'], FILTER_VALIDATE_EMAIL)) {
            $this->errores['correo'] = "El formato del correo no es válido.";
        }


        // VALIDAMOS NOMBRE Y SITUACION LABORAL QUE DEBEN SER OBLIGATIROS
        if ($this->datos['nombre'] === '') {
            $this->errores['nombre'] = "El nombre es obligatorio.";
        }

        // VALIDAMOS QUE HAYA ACEPTADO LOS TERMINOS Y CONDICIONES
        if ($this->datos['marcar'] !== true) {
            $this->errores['marcar'] = "Debes aceptar los términos y condiciones.";
        }
        //VALIDAMOS LA FOTO 
        if (!isset($_FILES['foto']) || 
            $_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) {
                $this->errores['foto'] = "La foto es obligatoria.";
        }
        elseif ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
            $this->errores['foto'] = "Error en la subida: código " . $_FILES['foto']['error'];
        }
        else{
            $foto = $_FILES['foto'];
            if ($foto['size'] > self::TAM_MAX ) {
                $this->errores['foto'] = 'La foto excede el tamaño permitido.';
            }
            if (!is_uploaded_file($foto['tmp_name'])) {
                $this->errores['foto'] = 'Peticion no valida';
            }
        }
        if(!isset($this->errores['foto'])){ 
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeReal = $finfo->file($foto['tmp_name']);
            $permitidos = [
            'image/jpeg' => 'jpg',
            'image/png' => 'PNG',
            'image/gif' => 'gif',];
            if (!array_key_exists($mimeReal, $permitidos)) {
                $this->errores['foto'] = "Tipo de archivo no permitido.";
            }
            $extension = $permitidos[$mimeReal];
            $nombreFinal = date('Ymd_His') . '_' . bin2hex(random_bytes(4))
            . '.' . $extension;
            $directorio = __DIR__ . '/../../public/uploads/';
            if(!is_dir($directorio)){
                if(!mkdir($directorio,0777,true)){
                    echo 'No se pudo crear el directorio';
                }
            }
            $rutaFinal = $directorio . $nombreFinal;
            if(move_uploaded_file($foto['tmp_name'],$rutaFinal)){
                $this->datos['foto'] = $nombreFinal;
            }else{$this->errores['success']='Error interno al guardar el archivo en el servidor';}

        }
    }
}