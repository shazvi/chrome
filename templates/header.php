<!DOCTYPE html>
<html>
<head>
    <?php if (isset($title)): ?>
        <title>My Chrome: <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
        <title>My Chrome</title>
    <?php endif ?>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/png" href="img/chrome.png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- <link href="css/nav.css" rel="stylesheet"> -->
    <?php if($_SERVER["PHP_SELF"]=="/index.php"):?>
        <link rel="stylesheet" href="css/easyTree.css">
        <script type="text/javascript" src="js/easyTree.js"></script>
        <script type="text/javascript" src="js/jquery.highlight-upd.js"></script>
    <?endif?>
</head>
<body <?php if($_SERVER["PHP_SELF"]=="/index.php")//echo'style="padding-top: 70px;"';?>>
<div class="container">
    <?php if($_SERVER["PHP_SELF"]!="/index.php"):?>
    <div class="page-header">
        <h1><?=isset($title)?$title:"";?> <small> Access your chrome bookmarks anywhere</small></h1>
    </div>
    <?endif?>