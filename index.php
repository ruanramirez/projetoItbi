<?php
header("Access-Control-Allow-Origin: *");
session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/*
 * Controllers
 */
$router->namespace("Source\App");

/*
 * WEB
 * home
 */
$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->post("/validateLogin", "Web:validateLogin", "web.validateLogin");
$router->get("/report", "Web:report", "web.report");


/*
 * WEB
 * register
 */
$router->get("/register", "Web:register", "web.register");
$router->post("/validateRegister", "Web:validateRegister", "web.validateRegister");

/*
 * WEB
 * signOut
 */
$router->get("/signOut", "Web:signOut", "web.signOut");

/*
 * WEB
 * painel
 */
$router->get("/user", "Web:user", "web.user");

/*
 * WEB
 * forgot
 */
$router->get("/modify", "Web:modify", "web.modify");

/*
 * ADMIN
 * home
 */
$router->group("admin");
$router->get("/", "Admin:home");

/*
 * ERROS
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}
