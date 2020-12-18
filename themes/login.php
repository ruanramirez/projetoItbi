<?php $v->layout("_theme"); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 mt-5">
            <form id="form-login" method="POST" action="<?= url('validateLogin') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input name="email" type="email" class="form-control" placeholder="Inserir usuário" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input name="password" type="password" class="form-control" placeholder="Inserir senha" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>

<?php $v->end(); ?>
