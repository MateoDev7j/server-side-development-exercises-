<?php
declare(strict_types=1);
namespace Controllers;
use Lib\Pages;
class HomeController{
    private Pages $pages;
    public function __construct(){
        $this->pages = new Pages();
        }
    public function inicio():void{
        $this->pages->render("home/inicio",[]);
    }
}