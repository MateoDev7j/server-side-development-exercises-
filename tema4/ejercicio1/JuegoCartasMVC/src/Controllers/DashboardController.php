<?php
namespace Controllers;
use Lib\Pages;
class DashboardController{
    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }
    public static function index():void{
        $datos = [
            'titulo' => 'Bienvenido al casino ',
            ];
        (new Pages())->render('dashboard/dashboard', $datos);
    }
}