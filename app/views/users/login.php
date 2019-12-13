<?php require APPROOT . '/views/inc/header.php';?>
    <div class="row">
        <?php flashMsg('incorrect_token');?>
        <div class="card-panel blue-grey darken-3 white-text col s12 l6 offset-l3">
            <?php flashMsg('register_success');?>
            <h2 class="center-align flow-text">Sign In</h2>
            <p class="center-align">Fill in the form to start posting.</p>
            <form action="<?php echo URLROOT;?>/users/login" method="post" class="col s12">
                <div class="input-field col s12 l8 offset-l2">
                    <i class="material-icons prefix white-text">mail</i>
                    <input type="text" id="icon_mail" name="email" value="<?php echo $data['email'] ?? '';?>">
                    <label for="icon_mail">Email: <sup class="red-text">*</sup></label>
                    <span class="helper-text red-text"><?php echo $data['email_error'] ?? '';?></span>
                </div>
                <div class="input-field col s12 l8 offset-l2">
                    <i class="material-icons prefix white-text">vpn_key</i>
                    <input type="password" id="icon_password" name="password">
                    <label for="icon_password">Password: <sup class="red-text">*</sup></label>
                    <span class="helper-text red-text"><?php echo $data['pwd_error'] ?? '';?></span>
                </div>
                <div class="col s5 l3 offset-l5 offset-s4">
                    <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <h5 class="center-align white-text flow-text">Don't have an account? <a href="<?php echo URLROOT;?>/users/register">Sign Up</a></h5>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>