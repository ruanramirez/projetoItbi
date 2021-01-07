<?php if(isset($_SESSION["userLogin"])): ?>
    <aside class="container p-3">
        <div class="row">
            <div class="pl-3" >
                <h5 class="text-light"><?= $user->name; ?></h5>
                <p class="text-light mb-5">Matrícula: <?= $user->company_number; ?></p>
            </div>
            <div class="" style="width:100%">
                <ul>
                    <li><a href="<?= $router->route('web.home'); ?>" style="width:100%" class="btn btn-dark">Início</a></li>
                </ul>
            </div>
        </div>
        <hr style="background-color: white">
        <div class="row">
            <div class="" style="width:100%">
                    <ul style="list-style: none;">
                        <li><a href="<?= $router->route('web.modify'); ?>" class="btn btn-dark mb-3" style="width:100%">Alterar senha</a></li>
                        <li><a href="" class="btn btn-dark" style="width:100%">Alterar dados</a></li>
                    </ul>
            </div>
        </div>
        <hr style="background-color: white">
        <div class="row">
            <div style="width: 100%">
                <a href="<?= $router->route("web.signOut"); ?>" class="btn btn-dark" style="width:100%">Sair</a>
            </div>
        </div>

    </aside>
<?php endif; ?>