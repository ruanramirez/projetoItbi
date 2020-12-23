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
        if(!isset($_SESSION['user'])){
            echo $this->view->render(
                "login", [
                "title" => "Acesso | " . SITE
            ]);
        }else{
            echo $this->view->render(
                "user", [
                "title" => "Painel | " . SITE
            ]);
        }
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
            if($user->user_status == 2){
                echo 2;
            } else {
                $_SESSION['user']['id'] = $user->id;
                $_SESSION['user']['email'] = $user->email;
                $_SESSION['user']['name'] = $user->name;

                echo 1;
            }
        }else{
            echo 3;
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

        if($data["password"] === $data["password_confirm"]){
            $user = new User();
            $user->name = $data["name"];
            $user->password = $data["password"];
            $user->email = $data["email"];
            $user->company_number = $data["company_number"];
            $user->save();

            if($user->fail()){
                echo json_encode($user->fail()->getMessage());
            }else{
                echo 1;
            }
        }else{
            echo 0;
        }
    }

    public function user()
    {
        $this->userConnect();
        echo $this->view->render(
            "user", [
            "title" => "Painel | " . SITE
        ]);
    }

    public function userConnect(): void
    {
        if(!$_SESSION["user"]) {
            $this->router->redirect("web.home");
        }
    }


    public function signOut(): void
    {
        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
        }

        $this->router->redirect('web.home');
    }

    public function error($data)
    {
        echo $this->view->render(
            "error", [
                "title" => " Erro {$data["errcode"]} | " . SITE
            ]
        );
    }
}