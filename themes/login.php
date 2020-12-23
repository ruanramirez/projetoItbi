<?php $v->layout("_theme"); ?>

<div class="wrapper">
    <div class="container-fluid pt-5">
        <div class="row mt-5 p-4 justify-content-center">
            <div class="col-6 text-center mb-5">
                <div class="web-div-box">
                    <div class="box-div-info p-5">
                        <div class="text-center mb-5">
                            <h3>Projeto ITBI</h3>
                        </div>
                            <hr>
                            <form class="form-signin" id="form-login" method="POST" action="<?= $router->route('web.validateLogin') ?>">

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Inserir e-mail" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Inserir senha" required>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-dark btn-block mt-3">Acessar</button>
                                </div>
                                <hr>
                                <a href="<?= $router->route('web.register'); ?>" class="btn btn-secondary btn-block">Cadastrar</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $v->start("scripts"); ?>
    <script>
        $("#form-login").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize()
            }).done(function(element) {
                if(element == 2){
                    swal({
                        title: "Atenção",
                        text: "Seu cadastro está pendente. Aguarde ou entre em contato com o Administrador.",
                        icon: "warning",
                        button: "Entendi",
                    });
                }else if(element == 3){
                    swal({
                        title: "Erro!",
                        text: "Essa combinação de login e senha não pertencem a um usuário.",
                        icon: "error",
                        button: "Entendi"
                    });
                }else{
                    window.location.href = "<?= $router->route("web.user");?>";
                }
            }).fail(function(){
                console.log("Erro!")
            }).always(function(element){
                console.log("Sempre!")
                console.log(element)
            });
        })

    </script>
<?php $v->end(); ?>
