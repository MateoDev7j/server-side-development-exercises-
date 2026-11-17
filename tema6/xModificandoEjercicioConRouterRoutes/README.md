# Ejercicio MVC: Login de Usuario

Este proyecto es una práctica de **MVC (Modelo-Vista-Controlador)** en PHP puro, sin frameworks ni bases de datos. Simula un sistema de inicio de sesión con comprobación de credenciales.

## Requisitos

- **PHP 8.1 o superior** (usa `readonly`, `enums` y `declare(strict_types=1)`).
- **Docker** (opcional, pero recomendado para el entorno de desarrollo).
- Servidor web (Docker) apuntando a la carpeta `public/`.

## Instalación y Ejecución

1. Clona el repositorio:
   `git clone https://github.com/MateoDev7j/tu-repositorio.git`
2. Si usas Docker, levanta el contenedor:
   `docker compose up -d`
3. Accede a la aplicación en tu navegador:
   `http://localhost/index.php`

## ¿Cómo funciona?

El proyecto sigue el patrón **MVC**:

- **Modelo (`src/Models/Usuario.php`)**: Representa al usuario con sus propiedades (`nombre`, `password`) y un método estático `fromArray()` para construirlo desde los datos del formulario.
- **Vista (`Views/usuario/`)**: Contiene el formulario de login (`login.php`) y la página de resultado (`resultado.php`). No tiene lógica de negocio, solo HTML y escapado de datos con `htmlspecialchars()`.
- **Controlador (`src/Controllers/UsuarioController.php`)**: Recibe la petición, valida los datos, comprueba las credenciales y decide qué vista mostrar.
- **Request (`src/Request/UsuarioRequest.php`)**: Se encarga de **sanear** y **validar** los datos del formulario (limpieza de espacios, comprobación de campos obligatorios, longitud de la contraseña, etc.).
- **FrontController (`src/Controllers/FrontController.php`)**: Enrutador que lee la URL y decide qué controlador y acción ejecutar.

## Credenciales de Prueba

Para simular una base de datos, el sistema tiene un usuario fijo:

| Campo     | Valor       |
|-----------|-------------|
| Usuario   | `Mateo`     |
| Contraseña| `M1234567`  |

Si introduces estas credenciales, accederás a la página de bienvenida. Si no, se te mostrará un mensaje indicando que el usuario no está en el sistema, manteniendo los datos introducidos en el formulario.

## Estructura del Proyecto

```text
JuegoCartasMVC/
├── public/                 # Única carpeta accesible desde el navegador
│   └── index.php           # Punto de entrada
├── config/
│   └── config.php          # Constantes (controlador y acción por defecto)
├── autoloader.php          # Carga automática de clases
├── src/
│   ├── Controllers/
│   │   ├── FrontController.php
│   │   ├── ErrorController.php
│   │   └── UsuarioController.php
│   ├── Lib/
│   │   └── Pages.php       # Motor de plantillas
│   ├── Models/
│   │   └── Usuario.php
│   └── Request/
│       └── UsuarioRequest.php
└── Views/
    ├── Layout/
    │   ├── header.php
    │   └── footer.php
    ├── error/
    │   └── error404.php
    └── usuario/
        ├── login.php
        └── resultado.php