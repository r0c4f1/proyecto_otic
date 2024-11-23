<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/css@3.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/select2.min.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/select2-bootstrap-5-theme.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/dataTables.dataTables.css">
    <?php 
    $url = $_SERVER['REQUEST_URI'];  // Obtener la URL actual
    $url = explode("/", htmlspecialchars($url));
    if (strtolower($url[2]) != "auth") { ?>
    <link rel="stylesheet" href="<?= media() ?>/css/styleTable.css">
    <link rel="stylesheet" href="<?= media() ?>/css/styles.css">
    <?php }else { ?>
    <link rel="stylesheet" href="<?= media() ?>/css/styleLogin.css">
    <?php } ?>
    <title><?= $data['page_title'] ?></title>
</head>

<body>