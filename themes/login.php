<?php $v->layout("_theme.php"); ?>
<!-- Formulário -->
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
                                <fieldset>
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" placeholder="Inserir e-mail" autofocus>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Inserir senha">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-dark btn-block mt-3">Acessar</button>
                                    </div>
                                    <hr>
                                    <a href="<?= $router->route('web.register'); ?>" class="btn btn-secondary btn-block">Cadastrar</a>
                                    <div class="mt-2">
                                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Esqueci a senha</a>
                                    </div>
                                </fieldset>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Recuperar senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-dark">Solicitar instruções</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts-->
<?php $v->start("scripts"); ?>
    <script>
        $("#form-login").on('submit', function(e){
            e.preventDefault();
            //armazena o formulario submetido em _thisForm
            const _thisForm = $(this);

            //lembrar de procurar sobre o ajax form, form validate, ajax validate, recomendação do gio

            //limpa qualquer validacao
            _thisForm.find(".is-invalid").removeClass("is-invalid").next().text("");

            let validate = true;

            // let email = _thisForm.find("[name=email]");
            // let password = _thisForm.find("[name=password]");
            //
            // if(!email.val()){
            //     email.addClass("is-invalid").next().text("Campo obrigatório!");
            //     validate = false;
            // }
            //
            // if(!password.val()){
            //     password.addClass("is-invalid").next().text("Campo obrigatório");
            //     validate = false;
            // }

            //validacao campos em branco front-end
            _thisForm.find("[name=email], [name=password]").each(function () {
                if(!$(this).val()){
                    $(this).addClass("is-invalid").next().text("Campo obrigatório!");
                        validate = false;
                }
            })

            if(!validate){
                return false;
            }

            const data = _thisForm.serialize();

            const fieldsetDisable = _thisForm.find("fieldset");
            fieldsetDisable.attr("disabled", true);

            $.ajax({
                url: _thisForm.attr("action"),
                type: _thisForm.attr("method"),
                data: data,
                dataType: "json"
            }).done(function(data) {
                if(data.redirect){
                    window.location.href = data.redirect;
                    return false;
                }

                //validacao campos em branco back-end
                if(data.required){
                    //forEach(arrays as key => value)
                    $.each(data.required, function (index, value) {
                        _thisForm.find(`[name=${value}]`).addClass("is-invalid").next().text("Campo obrigatório!");
                    });
                }

                //validacao de campos de formato invalido
                if(data.formatInvalid){
                    for(let prop in data.formatInvalid){
                        _thisForm.find(`[name=${prop}]`).addClass("is-invalid").next().text(data.formatInvalid[prop]);
                    }
                }

                if(data.login == "pending"){
                    swal({
                        title: "Atenção",
                        text: "Seu cadastro está pendente. Aguarde ou entre em contato com o Administrador.",
                        icon: "warning",
                        button: "Entendi",
                    });
                }else if(data.login == "notFound") {
                    swal({
                        title: "Erro!",
                        text: "Essa combinação de login e senha não pertencem a um usuário.",
                        icon: "error",
                        button: "Entendi"
                    });
                }
            }).fail(function(){
                console.log("Erro!");
            }).always(function(){
                fieldsetDisable.removeAttr("disabled");
            });
        })

    </script>
<?php $v->end(); ?>
