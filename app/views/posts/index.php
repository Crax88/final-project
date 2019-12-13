<?php require APPROOT . '/views/inc/header.php';?>
<?php flashMsg('post_message');?>
<div class="row">
    <div class="col s6">
        <h2 class="white-text">Posts</h2>
    </div>
    <div class="col s6">
        <h2 class="right">
            <a href="<?php echo URLROOT;?>/posts/add" class="btn">
                <i class="material-icons left">create</i>
                Add Post
            </a>
        </h2>    
    </div>
</div>
<div class="row">
    <?php foreach ($data['posts'] as $post) { ;?>
        <div class="card medium blue-grey darken-1 hoverable col s12 m4 offset-m1 l3 offset-l1">
        <?php if (!empty($post->img_name)) { ;?>
            <div class="card-image">
                <img src="<?php echo URLROOT?>/img/postsImg/<?php echo $post->img_name;?>" alt="post picture"class="responsive-img">
                <span class="card-title purple-text darken-2 header"><?php echo $post->title;?></span>
            </div>
        <?php } ;?>
            <div class="card-content white-text">
                <p class="right"><i class="material-icons left">remove_red_eye</i><?php echo $post->views;?></p>
                <?php if (empty($post->img_name)) { ;?>
                <span class="card-title"><?php echo htmlspecialchars($post->title);?></span>
                <?php };?>
                <p>Written by <?php echo htmlspecialchars($post->name);?> on <?php echo $post->postCreated;?></p>
                <div class="divider"></div>
                <p class="truncate"><?php echo htmlspecialchars($post->body);?></p>
            </div>
            <div class="card-action">
                <a href="<?php echo URLROOT;?>/posts/show/<?php echo $post->postId;?>">Read More</a>
            </div>
        </div>
    <?php };?>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>
