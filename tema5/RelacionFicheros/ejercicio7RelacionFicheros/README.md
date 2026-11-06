# Proyecto MVC: Gestión de Archivos y Subida de Imágenes

Este repositorio contiene una serie de ejercicios prácticos desarrollados en PHP puro utilizando el patrón de arquitectura MVC (Modelo-Vista-Controlador). El proyecto está diseñado para aprender a manejar el sistema de archivos de PHP de forma segura, incluyendo la lectura, creación, borrado de directorios y la subida de imágenes con validaciones estrictas.

## 📋 Características principales

*   **Arquitectura MVC desde cero:** Sin frameworks, con un enrutador frontal (FrontController), un motor de plantillas (Pages), y un autoloader personalizado.
*   **Manejo seguro de ficheros:** Uso de `is_file()`, `is_readable()`, `fopen()`, y `DirectoryIterator` para operar con el sistema de archivos.
*   **Subida de imágenes segura:**
    *   Validación de errores con `$_FILES['error']`.
    *   Comprobación de tamaño máximo en el servidor.
    *   Uso de `is_uploaded_file()` para prevenir inyecciones.
    *   Detección del tipo MIME real con `finfo` (nunca confiando en la extensión del usuario).
    *   Generación de nombres únicos e impredecibles con `random_bytes()`.
    *   Almacenamiento en una carpeta persistente (`public/uploads/`).
*   **Renderizado dinámico de la galería:** Listado automático de todas las imágenes subidas usando `DirectoryIterator` y mostradas en la vista.
*   **Redirecciones seguras:** Uso de `header('Location: ...')` con `exit` para evitar la ejecución de código posterior.

## 🚀 Requisitos

*   PHP 8.1 o superior (se utilizan tipos estrictos, `readonly`, `enums` y `match`).
*   Docker (recomendado para el entorno de desarrollo, o cualquier servidor web con Apache/Nginx apuntando a la carpeta `public/`).

## 🛠️ Instalación y Ejecución

1.  **Clona el repositorio:**
    ```bash
    git clone https://github.com/tu-usuario/nombre-del-repo.git
    ```

2.  **Si usas Docker, levanta el contenedor:**
    ```bash
    docker compose up -d
    ```

3.  **Accede a la aplicación en tu navegador:**
    ```text
    http://localhost/index.php
    ```

## Estructura del Proyecto

```text
proyecto/
├── public/                 # Única carpeta accesible desde el navegador
│   ├── index.php           # Punto de entrada (FrontController)
│   ├── uploads/            # Carpeta persistente para las imágenes subidas
│   └── ficheros/           # Carpeta para pruebas de lectura/escritura
├── config/
│   └── config.php          # Constantes (controlador y acción por defecto)
├── autoloader.php          # Carga automática de clases (PSR-4 manual)
├── src/
│   ├── Controllers/
│   │   ├── FrontController.php     # Enrutador principal
│   │   ├── ErrorController.php     # Gestión de errores 404
│   │   ├── ArchivosController.php  # Lógica de subida y listado de imágenes
│   │   └── FicherosController.php  # Lógica de pruebas con el sistema de archivos
│   ├── Lib/
│   │   └── Pages.php               # Motor de plantillas (renderiza vistas)
│   ├── Models/                     # (Opcional) Modelos de datos
│   └── Request/
│       └── ArchivosRequest.php     # Validación y saneamiento de archivos
└── Views/
    ├── Layout/
    │   ├── header.php              # Cabecera común
    │   └── footer.php              # Pie de página común
    ├── error/
    │   └── error404.php            # Vista de error 404
    ├── subirImagenes/
    │   └── formulario.php          # Formulario de subida y galería
    └── ficheros/                   # Vistas de los ejercicios de ficheros
```

## Ejercicios incluidos

*   **Abrir fichero de texto para lectura:** Función `abrirFicheroSiLegible()` que valida la existencia, permisos y devuelve el recurso o un mensaje de error.
*   **Crear y borrar directorios:** Script que crea un directorio dinámicamente, copia un archivo de prueba y lista su contenido con `DirectoryIterator`.
*   **Subida de imágenes:** Formulario con `enctype="multipart/form-data"` que valida, guarda y muestra una galería dinámica con todas las imágenes subidas.

## 🔒 Notas de seguridad

*   Nunca se confía en la extensión del archivo que envía el usuario. Se usa `finfo` para comprobar el tipo MIME real.
*   Los nombres de los archivos se generan con `random_bytes()`, evitando colisiones y ataques de *path traversal*.
*   Las imágenes se almacenan en `public/uploads/`, pero en un entorno de producción real se recomendaría almacenarlas fuera de la carpeta pública y servirlas a través de un controlador.
*   Se usa `htmlspecialchars()` en todas las vistas para prevenir ataques XSS.
*   Las redirecciones con `header()` van seguidas de `exit` para detener la ejecución del script.

## Aprendizajes clave

*   Implementación de un autoloader manual con `spl_autoload_register`.
*   Comprensión del ciclo de petición-respuesta en MVC.
*   Uso de la superglobal `$_FILES` y sus códigos de error.
*   Manejo de excepciones con `try-catch` (por ejemplo, en `DirectoryIterator`).
*   Importancia del escapado de datos en las vistas (`htmlspecialchars`).

## Licencia

Este proyecto es parte de un ejercicio académico. Siéntete libre de usarlo como plantilla para tus propios proyectos MVC.

**Autor:** Mateo Daniel Ortuño Ovando  
**Curso:** 2-DAW  
**Año:** 2026
