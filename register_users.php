
<?php
    include 'registeruser_back.php';
?>

<?php
require_once('configdb.php');
$action ="";
?>

<?php
class categories {
    public $category;
   
    
    function mails($category){
        global $link;
       // global $category;

    $result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM `contact_us` WHERE categories='$category'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    

    //number of unread messages
    $result_count_unread = mysqli_query($link,"SELECT COUNT(*) As total_unread FROM `contact_us` WHERE categories='$category'AND action='Unread'");
    $total_unread = mysqli_fetch_array($result_count_unread);
    $total_unread = $total_unread['total_unread'];
    $info1 = $total_records." | <span style='color:#DE3939'>Unread: ".$total_unread;
  echo $info1;
    
    }

        }
        
$bursary = new categories();
$ICT = new categories();
$servicom = new categories();
$transcript = new categories();
$student_affairs = new categories();
$others = new categories();
$registry = new categories();


  $result_count = mysqli_query($link,"SELECT COUNT(id) As total_mails FROM `contact_us`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_mails'];
  
  $result_count_unread = mysqli_query($link,"SELECT COUNT(*) As total_unread FROM `contact_us` WHERE action='Unread'");
  $total_unread = mysqli_fetch_array($result_count_unread);
  $total_unread = $total_unread['total_unread'];
  
  //echo $total_unread."and".$total_records;


?>    

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="asset/css/style.css">
  <title>Admin | Uniben</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/2ff0eac90c.js"></script>
  <style>
  a:hover{
    text-decoration: none;
    font-weight: bolder;
  }
</style>
  <body>
  <header class="cd-main-header js-cd-main-header" style="font-size:20px">
    <div class="cd-logo-wrapper">
      <a href="https://uniben.edu" target="blank" title="Uniben Home Page" class="cd-logo"><img src="assets/img/logo2.png" alt="Uniben Logo" style="height: 60px; width:80px"></a>
    </div>
    
    <div class="cd-search js-cd-search">
      <form>
        <input class="reset" type="search" placeholder="Search...">
      </form>
    </div>
  
    <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
  
    <ul class="cd-nav__list js-cd-nav__list">
      <li class="cd-nav__item"><a href="https://uniben.edu" target="blank"><h2 style="color:#fff;">Uniben</h2></a></li>
      <!--<li class="cd-nav__item"><a href="#0">Support</a></li>-->
      <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
        <a href="#0">
          <!--<img src="asset/img/cd-avatar.svg" alt="avatar">-->
          <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
          <span>Account</span>
        </a>
    
        <ul class="cd-nav__sub-list">
          <!--<li class="cd-nav__sub-item"><a href="#0">My Account</a></li>-->
          <li class="cd-nav__sub-item"><a href="changepass.php">Change password</a></li>
          <li class="cd-nav__sub-item"><a href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header> <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <nav class="cd-side-nav js-cd-side-nav" style="font-size:20px">
      <ul class="cd-side__list js-cd-side__list">
        <!--<li class="cd-side__label"><span>Main</span></li>-->
        <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
          <a href="#0">Categories</a>
          
          <ul class="cd-side__sub-list">
          <li class="cd-side__sub-item"><a href="adminview.php?category=registry" name="category" style="color:#BEC9B7; font-size:14px">Registry Mails: <?php $registry->mails('registry') ?></a></li>
          <li class="cd-side__sub-item"><a href="adminview.php?category=bursary" name="category" style="color:#BEC9B7; font-size:14px">Bursary Mails: <?php $bursary->mails('bursary'); ?></a></li>
          <li class="cd-side__sub-item"><a href="adminview.php?category=ICT/CRPU" name="category" style="color:#BEC9B7; font-size:14px">ICT/CRPU Mails: <?php $ICT->mails('ICT/CRPU') ?></a></li>
          <li class="cd-side__sub-item"><a href="adminview.php?category=servicom" name="category" style="color:#BEC9B7; font-size:14px">Servicom Mails: <?php $servicom->mails('servicom') ?></a></li>
            <li class="cd-side__sub-item"><a href="adminview.php?category=transcript" name="category" style="color:#BEC9B7; font-size:14px">Transcript Mails: <?php $transcript->mails('transcript') ?></a></li>
            <li class="cd-side__sub-item"><a href="adminview.php?category=student affairs" name="category" style="color:#BEC9B7; font-size:14px">Student Affairs Mails: <?php $student_affairs->mails('student affairs') ?></a></li>
            <li class="cd-side__sub-item"><a href="adminview.php?category=others" name="category" style="color:#BEC9B7; font-size:14px">Other Mails: <?php $others->mails('others') ?></a></li>
          </ul>
        </li>

        <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">
        <a style="font-size:15px;">Unread Mails<span class="cd-count"><?php echo $total_unread; ?></span></a>
        <a href="messagedb.php" style="font-size:15px;">Total Mails<span class="cd-count" style="background-color: #3E9230;"><?php echo $total_records; ?></span></a>
          
          <ul class="cd-side__sub-list">
            <!--<li class="cd-side__sub-item"><a aria-current="page" href="#0">All Notifications</a></li>-->
            <li class="cd-side__sub-item"></li>
            <!--<li class="cd-side__sub-item"><a href="#0">Other</a></li>-->
          </ul>
        </li>
    
        
          
         <!-- <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Bookmarks</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Bookmark</a></li>
            <li class="cd-side__sub-item"><a href="#0">Import Bookmark</a></li>
          </ul>-->
        </li>

        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
          <a href="#0"></a>
          
          <!--<ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="#0">All Images</a></li>
            <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>
          </ul>-->
        </li>
    
        <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
          <a href="admin.php">Users</a>
          
          <ul class="cd-side__sub-list">
            <li class="cd-side__sub-item"><a href="admin.php">All Users</a></li>
            <li class="cd-side__sub-item"><a href="reset_user_pass.php">Reset User password</a></li>
            <li class="cd-side__sub-item"><a href="register_users.php">Add User</a></li>
          </ul>
        </li>
      </ul>
    
      <!--<ul class="cd-side__list js-cd-side__list">
        <li class="cd-side__label"><span>Action</span></li>
        <li class="cd-side__btn"><button class="reset" href="#0">+ Button</button></li>
      </ul>-->
    </nav>
  
    <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Register New User</h1>

        </header>
        <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; 
            display: block; 
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }
        
    </style>
        <div class="wrapper">
        <h3>Create login details</h3>
        <!--<p>Please fill in your credentials to login.</p>-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
                    <label for="category">Category:</label>
                    <select type="select" name="category" value="<?php echo $category?>" id="category" class="form-control">                    
                            <option value = "1">Please select category</option>
                            <option value = "bursary">Bursary</option>
                            <option value = "ICT/CRPU">ICT/CRPU</option>
                            <option value = "servicom">Servicom</option>
                            <option value = "transcript">Transcript</option>
                            <option value = "student affairs">Student affairs</option>
                            <option value = "registry">Registry</option>
                            <option value = "others">Others</option>
                            </select>
                            <span class="help-block"><?php echo $category_err; ?></span>
                    </div>
            <div class="form-group">
            <a href="admin.php" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Submit">
                
            </div>
            
        </form>
        </div>

      </div>
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="asset/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="asset/js/menu-aim.js"></script>
  <script src="asset/js/main.js"></script>
</body>
</html>