<?php
/* photostreamGrid v1.0.0
 * Copyright 2015 Alex Donald
 * Licensed under MIT
 * https://www.adonald.co.uk/projects/photostreamgrid/
--------------------------------------------------------------------*/
define('__ROOT__', dirname(__FILE__));
include_once(__ROOT__.'/photos.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Edit this info -->
    <title>Photostream Grid</title>
    <meta name="description" content="Photostream Grid is a simple php application to display photos from your Flickr photostream in a grid on your own website.">
    <meta name="keywords" content="Flickr, photostream, photos, grid, php">
    <meta name="author" content="Alex Donald">

    <!-- Include CSS -->
    <link href="/css/styles.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="/js/respond.min.js"></script>
    <![endif]-->

</head>
<body class="no-touch">

    <div class="header">
        <h1>Photostream Grid</h1>
    </div>

    <?php echo $photosHTML; ?>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="/js/scripts.min.js"></script>

</body>
</html>
