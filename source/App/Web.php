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

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function home(): void
    {
        if (!isset($_SESSION["userLogin"])) {
            echo $this->view->render(
                "login", [
                "title" => "Acesso | " . SITE
            ]);
        } else {
            $this->user();
        }
    }

    public function report($data)
    {
        echo $this->view->render(
            "reportReview", [
            "title" => "Avaliação de laudos | " . SITE
        ]);
    }

    public function validateLogin($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $empty = array_keys($data, "");

        if ($empty) {
            echo json_encode(["required" => $empty]);
            exit;
        }

        if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
            echo json_encode(["formatInvalid" => [
                "email" => "Formato de email inválido!"
            ]]);
            exit;
        }

        $user = (new User())->find('email = :email AND password = :psw',
            "email={$data['email']}&psw={$data['password']}")->fetch();

        if (!$user) {
            echo json_encode(["login" => "notFound"]);
            exit;
        }

        if ($user->user_status != 1) {
            echo json_encode(["login" => "pending"]);
            exit;
        }

        $_SESSION["userLogin"] = $user->id;
        echo json_encode(["redirect" => $this->router->route("web.user")]);

        //att
        //$_SESSION["userLogin"]['id'] = $user->id;
        //$_SESSION["userLogin"]['email'] = $user->email;
        //$_SESSION["userLogin"]['name'] = $user->name;

    }

    public function register(): void
    {
        echo $this->view->render(
            "register", [
                "title" => "Cadastro | " . SITE
            ]
        );
    }

    public function validateRegister($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        //falta aplicar igual ao validateLogin()
        $empty = array_keys($data, "");

        $validatePassword = ($data["password"] === $data["password_confirm"]);

        if($empty){
            echo json_encode(["required" => $empty]);
            exit;
        }

        if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
            echo json_encode(["formatInvalid" =>[
                "email" => "Formato de email inválido!"
            ]]);
            exit;
        }

        if(!$validatePassword){
            echo json_encode(["registerVal" => "pswError"]);
            exit;
        }

        $user = new User();
        $user->name = $data["name"];
        $user->password = $data["password"];
        $user->email = $data["email"];
        $user->company_number = $data["company_number"];
        $user->user_type = $data["user_type"];
        $user->save();

        echo json_encode(["registerVal" => "success"]);
    }

    public function user(): void
    {
        $user = User::auth();
        if (!$user) {
            $this->router->redirect("web.home");
        }

        echo $this->view->render(
            "user", [
            "title" => "Painel | " . SITE,
            "user" => $user
        ]);
    }

    public function modify(): void
    {
        $user = User::auth();
        echo $this->view->render("modify",[
            "title" => "Alterar senha | " . SITE,
            "user" => $user
        ]);
    }


    public function signOut(): void
    {
        if (isset($_SESSION["userLogin"])) {
            unset($_SESSION["userLogin"]);
        }

        $this->router->redirect('web.home');
    }

    public function error($data): void
    {
        echo $this->view->render(
            "error", [
                "title" => " Erro {$data["errcode"]} | " . SITE
            ]
        );
    }
}