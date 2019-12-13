<nav class="blue-grey darken-3">
    <div class="nav-wrapper container">
      <a href="<?php echo URLROOT;?>" class="brand-logo"><?php echo SITENAME;?></a>
      <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if (isset($_SESSION['user_id'])) { ;?>
        <li><a href="#">Welcome <?php echo htmlspecialchars($_SESSION['user_name']) ?? '';?></a></li>
      <?php };?>
        <li><a href="<?php echo URLROOT;?>" >Home</a></li>
        <li><a href="<?php echo URLROOT;?>/main/about">About</a></li>
        <li><a href="<?php echo URLROOT;?>/posts">Posts</a></li>
        <?php if (isset($_SESSION['user_id'])) { ;?>
          <li><a href="<?php echo URLROOT;?>/users/logout">Sign Out</a></li>
        <?php } else { ;?>
          <li><a href="<?php echo URLROOT;?>/users/register">Sign Up</a></li>
          <li><a href="<?php echo URLROOT;?>/users/login">Sign In</a></li>
        <?php };?>
      </ul>
    </div>
  </nav>
  <ul class="sidenav grey darken-2" id="mobile-menu">
    <li><a href="<?php echo URLROOT;?>" class="white-text"><i class="material-icons white-text">home</i>Home</a></li>
    <li><div class="divider"></div></li>
    <li><a href="<?php echo URLROOT;?>/main/about" class="white-text"><i class="material-icons white-text">info</i>About</a></li>
    <li><div class="divider"></div></li>
    <li><a href="<?php echo URLROOT;?>/posts" class="white-text"><i class="material-icons white-text">insert_comment</i>Posts</a></li>
      <li><div class="divider"></div></li>
    <?php if (isset($_SESSION['user_id'])) { ?>
      <li><a href="<?php echo URLROOT;?>/users/logout" class="white-text"><i class="material-icons white-text">input</i>Sign Out</a></li>
    <?php } else { ?>
      <li><a href="<?php echo URLROOT;?>/users/register" class="white-text"><i class="material-icons white-text">person_add</i>Sign Up</a></li>
      <li><div class="divider"></div></li>
      <li><a href="<?php echo URLROOT;?>/users/login" class="white-text"><i class="material-icons white-text">person</i>Sign In</a></li>
    <?php };?>
  </ul>