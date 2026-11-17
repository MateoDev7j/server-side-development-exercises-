<?php
declare(strict_types=1);

namespace Request;
use finfo;
class ViviendaRequest
{
    const TAM_MAX= 100 * 1024; // 102400 bytes;
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
        
        $limpiarArray = static function(mixed $v) use ($limpiarText): array {
            if (!is_array($v)) return [];
            return array_filter(array_map($limpiarText, $v));
        };
        $limpiarPrecio = static fn(mixed $v): float => 
            (float) str_replace(',', '.', preg_replace('/[^0-9.,]/', '', (string)$v));

        $this->datos = [
            'tipoVivienda'   => $limpiarText($entrada['tipoVivienda'] ?? ''),
            'zona'           => $limpiarText($entrada['zona'] ?? ''),
            'direccion'      => $limpiarText($entrada['direccion'] ?? ''),
            'numDormitorios' => $limpiarText($entrada['numDormitorios'] ?? ''), 
            'precio'         => $limpiarPrecio($entrada['precio'] ?? ''),
            'tamano'         => $limpiarText($entrada['tamano'] ?? ''),
            'extras'         => $limpiarArray($entrada['extras'] ?? []),
            'foto'           => $limpiarText($entrada['foto'] ?? ''),
            'observaciones'  => $limpiarText($entrada['observaciones'] ?? ''),

        ];
    }

    public function validar(): void
    {
        //validar correo
        if ($this->datos['tipoVivienda'] === '') {
            $this->errores['TipoVivienda'] = "El tipo de vivienda es obligatorio.";
        } 

        // VALIDAMOS LA ZONA
        if ($this->datos['zona'] ===''){
            $this->errores['zona'] = "La zona es obligatoria.";
        }

        // VALIDAMOS LA DIRECCION
        if ($this->datos['direccion'] === '' ) {
            $this->errores['direccion'] = "¡Se requiere la direccion de la vivienda!!.";
        }

        // VALIDAMOS LOS NUMEROS DE DORMITORIOS
        if ($this->datos['numDormitorios'] === '') {
            $this->errores['numDormitorios'] = "¡Introduce los numeros de dormitorios!.";
        }
        //VALIDAMOS PRECIO
        if ($this->datos['precio'] === '') {
            $this->errores['precio'] = "El precio es obligatorio";
        }else if(!filter_var($this->datos['precio'], FILTER_VALIDATE_FLOAT)){
            $this->errores['precio'] = "El precio debe ser un valor numerico.";
        }
        //VALIDAMOS TAMAÑO 
        if($this->datos['tamano']===''){
            $this->errores['tamano']='El tamaño es obligatorio';
        }else if(!filter_var($this->datos['tamano'], FILTER_VALIDATE_INT)){
            $this->errores['tamano']='El tamaño tiene que ser un numero';
        }
        /**************************************/
        //VALIDACION UNICAMENTE PARA LA FOTO****
        /**************************************/
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
            if (array_key_exists($mimeReal, $permitidos)) {
                $extension = $permitidos[$mimeReal];
                $nombreFinal = date('Ymd_His') . '_' . bin2hex(random_bytes(4))
                . '.' . $extension;
                $directorio = __DIR__ . '/../../public/fotos/';
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
            else{
                $this->errores['foto'] = "Tipo de archivo no permitido.";
            }

        }
        
    }
}