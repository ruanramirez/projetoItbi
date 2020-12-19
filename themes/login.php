<?php $v->layout("_theme"); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <form id="form-login" method="POST" action="<?= $router->route('web.validateLogin') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Inserir usuário" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input name="password" type="password" class="form-control" placeholder="Inserir senha" required>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-primary">Acessar</button>
                    <a href="<?= $router->route('web.register') ;?>" class="btn btn-primary">Cadastrar</a>
                </div>
            </form>
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
            }).done(function() {
                console.log("Sucesso!")
            }).fail(function(){
                console.log("Erro!")
            }).always(function(){
                console.log("Sempre!")
            });
        })

    </script>
<?php $v->end(); ?>
