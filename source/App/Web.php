<?php


namespace Source\App;


use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Models\User;

class Web
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var Engine
     */
    private $view;

    /**
     * Web constructor.
     */
    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(THEMES, 'php');
        $this->view->addData([
            'router' => $router,
        ]);

        error_reporting(0);
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
    }
    public function home($data)
    {
        echo $this->view->render(
            "login", [
                "title" => "Início | " . SITE
            ]);
    }

    public function report($data)
    {
        echo $this->view->render(
            "reportReview",[
            "title" => "Avaliação de laudos | " . SITE
        ]);
    }

    public function validateLogin($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $user = (new User())->find('email = :email AND password = :psw',
            "email={$data['email']}&psw={$data['password']}")->fetch();
        if($user){
            if($user->status == 0){
                echo 3;
            } else {
                $_SESSION['user']['id'] = $user->id;
                $_SESSION['user']['email'] = $user->email;
                $_SESSION['user']['name'] = $user->name;
                $this->router->redirect('web.report');
            }
        } else {
            echo "Este usuário não existe.";
        }
    }

    public function register(): void
    {
        echo $this->view->render(
            "register",[
                "title" => "Cadastro | " . SITE
            ]
        );
    }

    public function validateRegister($data):void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
    }

    public function error($data)
    {
        echo "<h1>Web Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }
}