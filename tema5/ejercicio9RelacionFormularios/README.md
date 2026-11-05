#  Formulario de Perfil Profesional (Patrón MVC en PHP)

Este proyecto es una aplicación web desarrollada en **PHP puro (Vanilla PHP)** bajo una arquitectura **MVC (Modelo-Vista-Controlador)** robusta y desacoplada. Cuenta con un sistema de **saneamiento y validación estricta en el servidor** mediante el patrón *Form Request*, asegurando la integridad de los datos frente a manipulaciones malintencionadas en el cliente.

---

##  Características Clave

*   **Arquitectura MVC Limpia:** Separación total de responsabilidades (Enrutamiento, Controladores, Validación, Modelos de Dominio y Vistas).
*   **Front Controller:** Punto de entrada único (`index.php`) encargado de gestionar todas las peticiones de la aplicación de forma dinámica.
*   **Seguridad y Saneamiento Activo:** Uso de filtros nativos de PHP (`filter_var`), expresiones regulares (`preg_match`) y desinfección de HTML (`strip_tags`) antes de procesar cualquier dato.
*   **Validación Whitelist (Listas Blancas):** El servidor verifica que las opciones enviadas (situación laboral y lenguajes de programación) pertenezcan estrictamente a valores autorizados.
*   **Tipado Estricto:** Implementación de `declare(strict_types=1);` en las capas críticas del backend.

---

##  Arquitectura del Proyecto

El flujo sigue el estándar de diseño orientado a objetos con la siguiente estructura de carpetas:

```text
├── config/
│   └── config.php          # Configuración de acciones y controladores por defecto
├── src/
│   ├── Controllers/
│   │   └── ContactoController.php # Orquesta la carga de vistas y el procesamiento
│   ├── Models/
│   │   └── Contacto.php           # Entidad/Modelo puro con tipado estricto
│   ├── Request/
│   │   └── ContactoRequest.php    # Capa de aislamiento: Saneamiento y Validación
│   └── Lib/
│       └── Pages.php              # Clase utilidad para renderizar vistas
        └── helpers.php            # Clase hasta ahora solo utiliza e() para suplantar  htmlespecialchars()   
├── views/
│   ├── contacto/
│   │   ├── formulario.php         # Interfaz del formulario HTML5
│   │   └── resultado.php          # Vista de confirmación de datos correctos
│   └── layout/                    # Estructura común (cabeceras, pies de página)
└── index.php                      # Front Controller (Punto de entrada único)
```

---

##  Flujo de una Petición (Ciclo de Vida)

1.  **Punto de Entrada:** `index.php` recibe los parámetros `controller` y `action` mediante una petición `POST` o `GET`.
2.  **Enrutamiento:** Consultando `config.php`, el *Front Controller* instancia al controlador adecuado (`ContactoController`) y ejecuta su método.
3.  **Capa de Validación:** Al procesar el formulario, se instancia `ContactoRequest`. Su constructor automatiza dos fases críticas:
    *   **Saneamiento:** Limpia e inmuniza los datos de la súper-global `$_POST`.
    *   **Validación:** Aplica las reglas del negocio en el servidor. Si detecta fallos, frena el flujo y recolecta los errores.
4.  **Decisión del Controlador:**
    *   *Si hay errores:* Vuelve a renderizar el formulario inyectándole el array de `$errores` y el objeto `Contacto` parcial para mantener la persistencia.
    *   *Si los datos son válidos:* Crea la entidad de dominio `Contacto` mapeada limpiamente y la envía a la vista de resultados.

---

##  Reglas de Validación Implementadas en Servidor

Para mitigar ataques de inyección y manipulación de peticiones HTTP, el servidor valida de forma autónoma:

| Campo | Saneamiento Aplicado | Validación de Seguridad |
| :--- | :--- | :--- |
| **Nombre / Apellidos** | `strip_tags()` + `trim()` | Obligatorio. No puede estar vacío. |
| **Correo electrónico** | `FILTER_SANITIZE_EMAIL` | Obligatorio. Estructura e-mail válida (`FILTER_VALIDATE_EMAIL`). |
| **Teléfono** | `preg_replace()` (Mantiene `+`) | Opcional. Si se rellena, evalúa el formato original (Mínimo 9 dígitos). |
| **Situación Laboral** | `strip_tags()` | Comprobación estricta frente a *Array Blanco* en servidor. |
| **Lenguajes (Array)** | `array_map()` individual | Comprobación estricta de cada elemento en la *Lista Autorizada*. |
| **URL Trabajo** | `FILTER_SANITIZE_URL` | Estructura de enlace web real (`FILTER_VALIDATE_URL`). |
| **Términos (Check)** | Conversión implícita a Booleano | Obligatorio. Debe evaluarse como estrictamente `true`. |

---

## Instalación y Uso Local

1.  Clona este repositorio o copia los archivos dentro del directorio raíz de tu servidor local (ej. Apache en XAMPP/WampServer, Laragon o Docker).
2.  Asegúrate de tener instalada una versión de **PHP 8.0 o superior**.
3.  Inicia tu servidor web y accede a la aplicación mediante el navegador:
    ```bash
    http://localhost/tu-proyecto/index.php?controller=contacto&action=formulario
    ```
