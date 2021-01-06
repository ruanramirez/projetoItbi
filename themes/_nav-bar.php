<?php if(isset($_SESSION["userLogin"])): ?>
    <div class="container-fluid p-3">
        <div class="row" >
            <h5 class="text-light">Olá, <?= $user->name; ?></h5>
            <p class="text-light">Matrícula: <?= $user->company_number;?></p>
        </div>
        <div class="row d-inline-flex bd-highlight justify-content-betweeen">
            <div class="col-12" align="center">
                <p></p>
                <a href="" class="btn text-light bg-secondary mb-3">Alterar senha</a>
                <a href="" class="btn text-light bg-secondary mb-5">Alterar dados</a>
            </div>
            <div class="col-12" align="center">
                <a href="<?= $router->route("web.signOut"); ?>" class="btn btn-light">Sair</a>
            </div>
        </div>

    </div>
<?php endif; ?>