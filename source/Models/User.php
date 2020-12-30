<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true
        parent::__construct("users", [], "id", false);
    }

    public static function auth(): ?User
    {
        //verificar se a sessao de login existe
        if(!isset($_SESSION["userLogin"])){
            return null;
        }

        $user = (new User)->findById($_SESSION["userLogin"]);
        if(!$user || !$user->user_status == 1){
            unset($_SESSION["userLogin"]);
            return null;
        }

        return $user;
    }
}