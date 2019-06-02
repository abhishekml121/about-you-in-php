<?php
  if(!isset($page_title)) { $page_title = 'Just learning PHP'; }
  if(!isset($header_title)) { $header_title = 'Just learning PHP'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title> <?php echo $page_title; ?> </title>
  <style type="text/css">
   
     <?php if(strpos(CURRENT_OPENED_PAGE, 'register.php')){echo "#link_to_registser_page";}
      elseif (strpos(CURRENT_OPENED_PAGE, 'members.php')){echo "#link_to_member_page";}
        elseif (strpos(CURRENT_OPENED_PAGE, 'about_me.php')){echo "#link_to_about_me_page";}
          elseif (strpos(CURRENT_OPENED_PAGE, 'login.php')){echo "#link_to_login_page";}elseif (strpos(CURRENT_OPENED_PAGE, 'index.php')) {echo "#link_to_index_page";}elseif (strpos(CURRENT_OPENED_PAGE, 'profile.php')) {echo "#show_user_submenu";}elseif (strpos(CURRENT_OPENED_PAGE, 'edit.php')) {echo "#edit_user_details";}
          ?>
          {
      background-color: white;
      font-size: 20px;
      padding: 10px;
      display: inline-block;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      text-decoration: none;
     }

     <?php
     $home_index_page = '/each_user_profile_page_in_PHP/index.php';
     if ($home_index_page == CURRENT_OPENED_PAGE) {
       echo "footer";}
     ?>
     {
     position: fixed;top: 1200px}
     
  </style>
  
	<link rel="stylesheet" media="all" href="<?php echo '/'. raw_u(ROOT).'/stylesheets/style.css'; ?>" />
</head>

  <body>
    
    <header>
      <h1><?php echo $header_title;?></h1>
    </header>

    <nav id="nav_of_index_page">
     
      <ul>
              <li id="link_to_index_page"><a href="<?php echo '/'. raw_u(ROOT).'/index.php'; ?>">HOME</a></li>
              <li id="link_to_member_page"><a href="<?php echo '/'. raw_u(ROOT).'/paths/members.php'; ?>">All users</a></li>
              <li id="link_to_about_me_page"><a href="<?php echo '/'. raw_u(ROOT).'/paths/about_me.php'; ?>">About me</a></li>
              <?php if(empty($_SESSION['user_id'])):?>
              <li id="link_to_registser_page"><a href="<?php echo '/'. raw_u(ROOT).'/paths/register.php'; ?>">Free Account</a></li>
              <li id="link_to_login_page"><a href="<?php echo '/'. raw_u(ROOT).'/paths/login.php#login_form'; ?>">Login</a></li>
            <?php endif;?>

              <?php if(!empty($_SESSION['user_id'])):?>
              <li id="show_user_submenu"><a href="<?php echo '/'. raw_u(ROOT).'/paths/profile.php'; ?>"><?php echo 'Hi '. ucfirst($_SESSION['first_name'])."<span id='down_icon'>&#8595;</span>";?></a>
                <ul id="user_submenu">
                  <li id="link_to_collections"><a href="<?php echo '/'. raw_u(ROOT).'/paths/my_details.php'; ?>" >Your Collections</a></li>
                  <li id="edit_user_details"><a href="<?php echo '/'. raw_u(ROOT).'/paths/edit.php'; ?>" >Edit your profile</a></li>
                  <li id="delete_account"><a href="<?php echo '/'. raw_u(ROOT).'/paths/delete.php'; ?>" >Delete your Account</a></li>
                  <li><a href="<?php echo '/'. raw_u(ROOT).'/paths/logout.php'; ?>">Log out</a></li>
                  
                </ul>
              <?php endif; ?>
              </li>
              <li id="link_to_games"><a href="<?php echo '/'. raw_u(ROOT).'/games.php'; ?>" >🄶🄰🄼🄴🅂<big>🦹</big></a></li>

      </ul>
    </nav>
