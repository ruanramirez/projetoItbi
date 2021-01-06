<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"<?= $title; ?>"</title>
    <link rel="stylesheet" href="<?= url("/themes/assets/css/style.css"); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?= $v->section("css") ?>
</head>
<body class="body">

<div class="container-fluid">
    <div class="row">
        <?php if (isset($_SESSION["userLogin"])): ?>
            <div class="col-2 p-2 d-none d-block bg-dark" style="height: 100vh">
                <?= $v->insert("_nav-bar") ?>
            </div>

            <div class="col-10 p-2">
                <?= $v->section("content"); ?>
            </div>
        <?php
        else:
            ?>
            <div class="col-12">
                <?= $v->section("content"); ?>
            </div>
        <?php
        endif; ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?= $v->section("scripts") ?>
</body>
</html>