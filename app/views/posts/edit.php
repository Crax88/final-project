<?php require APPROOT . '/views/inc/header.php';?>
<a href="<?php echo URLROOT;?>/posts" class="btn waves-effect waves-teal blue-grey lighten-2"><i class="material-icons left">arrow_back</i>Back</a>

<div class="row">
    <div class="col s12 l6 offset-l3">
        <h4 class="center">Edit Post</h4>
        <p class="center">Edit post with this form</p>
        <form id="post_form" class="card blue-grey darken-1" action="<?php echo URLROOT;?>/posts/edit/<?php echo $data['id'];?>" method="post">
            <div class="card-content">
            <!-- <form action="<?php echo URLROOT;?>/posts/add" method="post" id="post_form"> -->
                <div class="input-field">
                    <input type="text" id="title" name="title" placeholder="Enter post title" value="<?php echo $data['title'];?>">
                    <label for="title">Post Title</label>
                    <span class="helper-text red-text"><?php if (!empty($data['title_error'])) {echo $data['title_error'];};?></span>
                </div>
                <div class="input-field">
                    <textarea type="text" id="body" class="materialize-textarea" name="body" placeholder="Enter post body"><?php echo $data['body'];?></textarea>
                    <label for="body">Post Body</label>
                    <span class="helper-text red-text"><?php if (!empty($data['body_error'])) {echo $data['body_error'];};?></span>
                </div>
            <!-- </form> -->
            </div>
            <div class="card-action">
                <button class="btn waves-effect waves-light" type="submit" name="submit">
                    <i class="material-icons left">done</i>
                    Submit
                </button>
                <a href="<?php echo URLROOT;?>/posts" class="btn waves-effect waves-red red lighten-2"><i class="material-icons left">close</i>Cancel</a>
            </div>
</form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>
