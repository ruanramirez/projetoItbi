<?php if(isset($_SESSION["userLogin"])): ?>
    <div class="container-fluid p-3">
        <div class="profile" >
            <h5 style="color: #070707">Olá, <?= $user->name; ?></h5>
            <p style="color: #070707">Matrícula: <?= $user->company_number;?></p>
        </div>
        <a href="<?= $router->route("web.signOut"); ?>" class="btn btn-secondary">Sair</a>
    </div>
<?php endif; ?>