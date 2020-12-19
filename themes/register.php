<?php $v->layout("_theme.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <form method="POST" action="<?= $router->route('web.validateRegister')?>" id="form-register">
                <div class="d-flex flex-row-reverse mb-5">
                    <a href="<?= $router->route('web.home') ;?>" class="btn btn-secondary">Voltar</a>
                </div>

                <h3>Formulário de cadastro</h3>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Matrícula</label>
                        <input name="company_number" type="text" class="form-control" id="inputCity" placeholder="12345-6" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Cargo</label>
                        <select name="type" id="inputState" class="form-control" required>
                            <option selected>Selecione</option>
                            <option value="1">Auditor fiscal</option>
                            <option value="2">Coordenador</option>
                            <option value="3">Funcionário</option>
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
                        <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Inserir senha" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword5">Confirmar Senha</label>
                        <input name="password_confirm" type="password" class="form-control" id="inputPassword5" placeholder="Inserir senha novamente" required>
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
        $("#form-register").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function () {
                console.log("Sucesso!")
            }).fail(function () {
                console.log("Erro!")
            }).always(function () {
                console.log("Sempre!")
            });
        })
    </script>
<?php $v->end()?>
