<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT;?>/posts" class="btn waves-effect waves-teal blue-grey lighten-2"><i class="material-icons left">arrow_back</i>Back</a>
<div class="row">
    <div class="col s12">
        <div class="card">
        <?php if (!empty($data['post']->img_name)) { ;?>
            <div class="card-image">
                <img src="<?php echo URLROOT?>/img/postsImg/<?php echo $data['post']->img_name;?>" alt="post picture" class="materialboxed bigImage" data-caption="<?php echo $data['post']->img_originalName;?>">
                <span class="card-title purple-text darken-2"><?php echo $data['post']->title;?></span>
            </div>
        <?php } ;?>

            <div class="card-content blue-grey darken-3 white-text">
                <?php if (empty($data['post']->img_name)) {;?>
                    <span class="card-title center"><?php echo $data['post']->title;?></span>
                <?php };?>
                    <div class="grey lighten-2 black-text">
                        Written by <?php echo htmlspecialchars($data['user']->name);?> on <?php echo $data['post']->created_at;?>
                    </div>
                    <br>
                    <p class="flow-text bodyTxt"><?php echo htmlspecialchars($data['post']->body);?></p>
            </div>
            <div class="card-action blue-grey darken-1 vertical-align">
                <div class="row">
                    <?php if ($data['post']->user_id == $_SESSION['user_id']) { ;?>
                    <div class="col s12 m4 center-align">
                        <a href="<?php echo URLROOT;?>/posts/edit/<?php echo $data['post']->id;?>" class="btn btn-block teal"><i class="material-icons left">create</i> Edit</a>
                    </div>
                    <div class="col s12 m4 center-align">
                        <a href="<?php echo URLROOT;?>/posts/delete/<?php echo $data['post']->id;?>" class="btn btn-block red"><i class="material-icons left">delete</i>Delete</a>
                    </div>

                    <?php };?>
                    <div class="col s12 m4 center-align">
                        <a href="<?php echo URLROOT;?>/posts/comments/<?php echo $data['post']->id;?>" class="btn btn-block teal botton flow-text"><i class="material-icons left">speaker_notes</i>Show Comments</a>
                    </div>
                </div>
            </div>
            <?php if (!empty($data['post']->comments)) {;?>
            <div class="col s12 blue-grey darken-4 white-text">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Comments</h4></li>
                    
                </ul>
            </div>
            <?php };?>
            <div class="col s12 center-align blue-grey">
                    <form action="<?php echo URLROOT;?>/posts/comments/<?php echo $data['post']->id;?>" method="post" class="col s12 m6 offset-m3">
                        <h5 class="white-text">Rate and comment post</h5>
                        <p class="col s2">
                            <label>
                                <input name="rating" type="radio" value="1" class="with-gap"/>
                                <span>1</span>
                            </label>
                        </p>
                        <p class="col s2">
                            <label>
                                <input name="rating" type="radio" value="2" class="with-gap"/>
                                <span>2</span>
                            </label>
                        </p>
                        <p class="col s2">
                            <label>
                                <input name="rating" type="radio" value="3" class="with-gap"/>
                                <span>3</span>
                            </label>
                        </p>
                        <p class="col s2">
                            <label>
                                <input name="rating" type="radio" value="4" class="with-gap"/>
                                <span>4</span>
                            </label>
                        </p>
                        <p class="col s2">
                            <label>
                                <input name="rating" type="radio" value="5" class="with-gap"/>
                                <span>5</span>
                            </label>
                        </p>
                        <input type="text" name="comment">
                        <button type="submit" class="btn teal"><i class="material-icons left flow-text">speaker_notes</i>Comment</button>
                    </form>
                </div>

        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>
