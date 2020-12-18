<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true
        parent::__construct("itbi", [], "", true);
    }
}