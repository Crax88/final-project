<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: lightgrey;
    }
    .errors {
        width: 40%;
        height: 40%;
        border: 2px solid black;
        text-align: center;
        margin: 10% auto 0 auto;
    }
</style>
    <div class="errors">
        <h2 style="color:red;"><?php echo $data['code'];?></h2>
        <h4><?php echo $data['message'];?></h4>
    </div>
</body>
</html>