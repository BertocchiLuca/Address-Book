<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <!-- Style del menu -->
    <link rel="stylesheet" href="web\css\menu.css"/>
    <!-- Style dell'icona della testa -->
    <link rel="shortcut icon" href="web\img\MockupSony.jpg"/>
    <!-- Style della home -->
    <link rel="stylesheet" href="web\css\home.css"/>
    <!-- Style della pagina di inserimento -->
    <link rel="stylesheet" href="web\css\EnterContacts.css"/>
    <!-- Style della pagina di modifica -->
    <link rel="stylesheet" href="web\css\ModifyContacts.css"/>
    <!-- Style della pagina di visualizzazione  -->
    <link href="web\css\ViewContacts.css" rel="stylesheet" type = "text/css">
</head>

<body>
    <?php
        include 'config/config.php';
        if(!isset($_GET['action'])){
            $action = 'Home';
        } else {
            $action = $_GET['action'];
        }
        switch($action){
            case "Home": {
                include 'php/view/Home.php';
                break;
            } 
            case "EnterContacts": {
                include 'php/controller/EnterContacts.php';
                break;
            }
                
            case "ViewContacts": {
                include 'php/view/ViewContacts.php';
                break;
            }
                
            case "ModifyContacts": {
                include 'php/controller/ModifyContacts.php';
                break;
            }
                
        }

    ?>

</body>