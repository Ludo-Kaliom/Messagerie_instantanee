<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Messagerie instantanée</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <?php 
    error_log("Content : ".print_r($content, 1));
    
    echo $content ?>
 </body>
</html>
<?php
/*Savoir si jQuery est installée (code javascript)
if (typeof jQuery != 'undefined') {
 	 		alert ("jQuery library is loaded!");
 	 	}else { 
 	 	 	alert ("jQuery library is not found!");
 	 	}
*/
?>