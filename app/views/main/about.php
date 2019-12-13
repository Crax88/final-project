<?php require APPROOT . '/views/inc/header.php';?>
<div class="card-panel grey lighten-3">
    <div class="container">
        <h1><?php echo $data['title'];?></h1>
        <p><?php echo $data['description'];?></p>
        <p>Version: <strong><?php echo APPVERSION;?></strong></p>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>