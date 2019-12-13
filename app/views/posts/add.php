<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT;?>/posts" class="btn waves-effect waves-teal blue-grey lighten-2"><i class="material-icons left">arrow_back</i>Back</a>

<div class="row">
    <div class="col s12 l6 offset-l3">
        <h4 class="center white-text">Add Post</h4>
        <p class="center white-text">Create post with this form</p>
        <form id="post_form" class="card blue-grey darken-1" action="<?php echo URLROOT;?>/posts/add" method="post" enctype="multipart/form-data">
            <div class="card-content">
                <div class="input-field">
                    <input class="white-text" type="text" id="title" name="title" placeholder="Enter post title" value="<?php echo $data['title'] ?? '';?>">
                    <label for="title">Post Title</label>
                    <span class="helper-text red-text"><?php echo $data['title_error'] ?? '';?></span>
                </div>
                <div class="input-field">
                    <textarea type="text" id="body" class="materialize-textarea" name="body" placeholder="Enter post body"><?php echo $data['body'] ?? '';?></textarea>
                    <label for="body">Post Body</label>
                    <span class="helper-text red-text"><?php echo $data['body_error'] ?? '';?></span>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s10 offset-s1 m6 offset-m3">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path" placeholder="upload image for your post">
                    </div>
                </div>
            </div>    
            <div class="card-action">
                <button class="btn waves-effect waves-light" type="submit" name="submit">
                    <i class="material-icons left">done</i>
                    Add post
                </button>
                <a href="<?php echo URLROOT;?>/posts" class="btn waves-effect waves-red red lighten-2 right"><i class="material-icons left">close</i>Cancel</a>
            </div>
</form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>
