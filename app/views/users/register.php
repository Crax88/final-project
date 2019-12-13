<?php require APPROOT . '/views/inc/header.php';?>
    <div class="row">
        <div class="card-panel blue-grey darken-3 white-text col s12 l10 offset-l1">
            <h2 class="center-align flow-text">Create An Account</h2>
            <p class="center-align">Fill in the form to join us.</p>
            <form action="<?php echo URLROOT;?>/users/register" method="post" class="col s12">
                <div class="input-field col s12 l6 offset-l3">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" id="icon_name" name="name" value="<?php echo htmlspecialchars($data['name'] ?? '');?>">
                    <label for="icon_name">Name: <sup class="red-text">*</sup></label>
                    <span class="helper-text red-text"><?php echo $data['name_error'] ?? '';?></span>
                </div>
                <div class="input-field col s12 l6 offset-l3">
                    <i class="material-icons prefix">mail</i>
                    <input type="text" id="icon_mail" name="email" value="<?php echo htmlspecialchars($data['email'] ?? '');?>">
                    <label for="icon_mail">Email: <sup class="red-text">*</sup></label>
                    <span class="helper-text red-text"><?php echo $data['email_error'] ?? '';?></span>
                </div>
                <div class="input-field col s12 l6 offset-l3">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" id="icon_password" name="password">
                    <label for="icon_password">Password: <sup class="red-text">*</sup></label>
                    <span class="helper-text red-text"><?php echo $data['pwd_error'] ?? '';?></span>
                </div>
                <div class="input-field col s12 l6 offset-l3">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" id="icon_rePassword" name="rePassword">
                    <label for="icon_rePassword">Confirm password: <sup class="red-text">*</sup></label>
                    <span class="helper-text red-text"><?php echo $data['rePwd_error'] ?? '';?></span>
                </div>
                <div class="col s5 l3 offset-l5 offset-s4">
                    <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            <h6 class="center-align flow-text">Have an account? <a href="<?php echo URLROOT;?>/users/login">Sign In</a></h6>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';?>