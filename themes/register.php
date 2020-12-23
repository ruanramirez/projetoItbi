<?php $v->layout("_theme.php"); ?>

<div class="container">
    <div class="row content">
        <div class="col-md-12 mt-5">
            <form method="POST" action="<?= $router->route('web.validateRegister')?>" class="form-register">
                <div class="d-flex flex-row-reverse mb-5">
                    <a href="<?= $router->route('web.home') ;?>" class="btn btn-secondary">Voltar</a>
                </div>

                <h3>Formulário de cadastro</h3>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Matrícula</label>
                        <input name="company_number" type="text" class="form-control" id="inputCity" placeholder="123456-7" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Cargo</label>
                        <select name="user_group" id="inputState" class="form-control" required>
                            <option selected>Selecione</option>
                            <option value="2">Auditor fiscal</option>
                            <option value="3">Coordenador</option>
                            <option value="4">Funcionário</option>
                        </select>

                    </div>
                </div>
                <div class="form-group mb-5">
                    <label for="inputAddress">Nome completo</label>
                    <input name="name" type="text" class="form-control" id="inputAddress" placeholder="" required>
                </div>
                <h4>Dados da conta</h4>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">E-mail</label>
                        <input name="email"type="email" class="form-control" id="inputEmail4" placeholder="example@mail.com" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Senha</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Inserir senha" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword5">Confirmar Senha</label>
                        <input name="password_confirm" type="password" class="form-control" id="password_confirm" placeholder="Inserir senha novamente" required>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                    <button type="reset" class="btn btn-lg btn-white">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $v->start('scripts')?>
    <script>
        $(".form-register").on('submit', function(e){
            e.preventDefault();

            const psw = $("#password").val();
            const pswConfirm = $("#password_confirm").val();

            if(psw === pswConfirm){
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize()
                }).done(function (element) {
                    if(element == 0){
                        swal({
                            title: "Atenção",
                            text: "As senhas não são idênticas.",
                            icon: "warning",
                            button: "Entendi",
                        });
                    }else if(element == 1){
                        swal({
                            title: "Sucesso!",
                            text: "O usuário foi cadastrado.",
                            icon: "success",
                            button: "Entendi"
                        });
                    }else{
                        swal({
                            title: "Erro!",
                            text: "Não foi possível cadastrar o usuário. Tente novamente mais tarde",
                            icon: "error",
                            button: "Entendi"
                        });
                    }
                }).fail(function () {
                    console.log("Erro!")
                }).always(function () {
                    //loading
                });
            }else{
                swal({
                    title: "Atenção",
                    text: "As senhas não são idênticas.",
                    icon: "warning",
                    button: "Entendi",
                });
            }
        })

        // function alerts(title, text, icon, button){
        //     swal({
        //         title: title,
        //         text: text,
        //         icon: icon,
        //         button: button,
        //     }).then(function (e){
        //         console.log(e);
        //     });
        // }
    </script>
<?php $v->end()?>
