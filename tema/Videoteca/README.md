# Mi videoteca (proyecto base)

Proyecto base de la práctica guiada de sesiones en PHP 8.
Requiere **PHP 8.4** (el código usa `new Clase()->metodo()` y constantes tipadas).

## Cuentas de prueba
| Usuario | Contraseña |
|---|---|
| ana@aula.es | 1234 |
| luis@aula.es | 1234 |



## Qué está hecho y qué falta
- Ya está hecho: Router, Pages, helpers (`e()`, `url()`, `redirect()`), modelos, vistas, `UserController`, `PeliculaController` y rutas.
- Vuestro trabajo (busca los `TODO`): `src/Core/Session.php`, `src/Controllers/AuthController.php`, `src/Middlewares/AuthMiddleware.php`, la protección de `UserController`/`PeliculaController` y, en la etapa 3, envolver las rutas privadas de `config/routes.php` con `AuthMiddleware::proteger()`.
