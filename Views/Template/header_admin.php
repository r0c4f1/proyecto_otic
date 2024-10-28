<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/css@3.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/fontawesome/css/fontaweome.min.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/select2.min.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="<?= media() ?>/css/plugins/datatables.min.css">
    <?php 
    $url = $_SERVER['REQUEST_URI'];  // Obtener la URL actual
    $url = explode("/", htmlspecialchars($url));
    if (strtolower($url[2]) != "auth") { ?>
    <link rel="stylesheet" href="<?= media() ?>/css/sidebar.css">
    <?php }else { ?>
    <link rel="stylesheet" href="<?= media() ?>/css/styles.css">
    <?php } ?>
    <title><?= $data['page_title'] ?></title>
</head>

<body>