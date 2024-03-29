<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/main.css">
    <title><?php echo SITENAME;?></title>
    <style>
        #preloader {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
        }
        .collapsible li.active .collapsible-body {
            display: block;
        }
    </style>
</head>
<body>
<?php require APPROOT . '/views/inc/navbar.php';?>
<main class="container">
