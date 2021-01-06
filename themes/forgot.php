<?php $v->layout("_theme.php")?>

<div class="wrapper">
    <div class="container p-5">
        <div class="d-flex flex-row-reverse mb-5">
            <a href="<?= $router->route('web.home'); ?>" class="btn btn-secondary">Voltar</a>
        </div>
        <div class="row mt-5 p-4 justify-content-center">
            <div class="col-6 mb-5 mt-5">
                <form class="web-div-box">
                    <div class="box-div-info p-5">
                        <div class="text-center">
                            <h6>Informe o seu e-mail abaixo para receber as instruções de como criar uma nova senha.</h6>
                        </div>
                        <hr>
                        <div class="mt-2">
                            <div class="form-group  has-feedback">
                                <input type="text" class="form-control  input-lg" placeholder="Inserir e-mail">
                                <span class="form-control-feedback" ></span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn  btn-dark">Criar nova senha</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
