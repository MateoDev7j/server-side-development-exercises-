<?php
declare(strict_types=1);

namespace Controllers;

use Core\Pages;
use Core\Session;
use Models\PeliculaModel;

/** Controlador de PeliculaModel. */
final class PeliculaController
{
    /** Catálogo completo. */
    public function index(): void
    {
        if (!Session::has('user_id')) { 
            redirect('login'); 
        }
        $peliculas = (new PeliculaModel())->all();

        (new Pages())->render('pelicula/lista', ['titulo' => 'Catálogo', 'peliculas' => $peliculas]);
    }       

    /** Solo las películas del usuario que tiene la sesión abierta. */
    public function mias(): void
    {
        if (!Session::has('user_id')) { 
            redirect('login'); 
        }
        $peliculas = (new PeliculaModel())->allByUser((int) Session::get('user_id'));

        (new Pages())->render('pelicula/lista', ['titulo' => 'Mis películas', 'peliculas' => $peliculas]);
    }
}
