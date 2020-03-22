<?php
session_start();
if (isset($_SESSION['user'])) {
    include '../components/header.php';
    include '../../connDB.php';
    $Suser=$_SESSION['user'];
    $qUser = $conn->prepare("SELECT * FROM users WHERE user ='$Suser'");
    $qUser->execute();
    $user=$qUser->fetch();
    $id_user = $user['id'];
    if (isset($_POST['edit'])) {
      $username         = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
      $password         = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
      $confirm_password = filter_var($_POST['confirm_password'],FILTER_SANITIZE_STRING);
      $err = array();
      $pass_hash='';
      if (empty($password)) {
          $pass_hash=$user['pass']; //if didn't write any password the password will be the old one
      }else{
          $pass_hash=sha1($password);
      }
      $q_chk_user=$conn->prepare("SELECT * FROM users WHERE user = '$username' AND id !=$id_user ");
      $q_chk_user->execute();
      $count_chk=$q_chk_user->rowCount();
      if ($count_chk!=0) {
        $err[]="Sorry the username exists";
      }
      if (empty($username)) {
          $err[]="Enter username  ";
      }elseif (strlen($username)<=3) {
          $err[]="Please enter username more than 3 characters";
      }elseif (strlen($username)>30) {
          $err[]="Please enter username less than 30 characters";
      }

      if (strlen($password)>30) {
        $err[]="Please enter Password less than 30 characters";
      }elseif (strlen($password)<5 && !empty($password)) {
        $err[]="Please enter password more than 5 characters";
      }else{
        if ($password != $confirm_password) {
          $err[]="error comfirmed password";
        }
      }
      if (!empty($err)) {
        foreach ($err as $Msgerr) {
          echo '<div class="alert alert-danger">' . $Msgerr . '</div>';
        }
      }else{
        $update = $conn->prepare("UPDATE users SET user='$username' , pass='$pass_hash' WHERE id ='$id_user'");
        $update->execute();
        $_SESSION['user']=$username;
        echo "<div class='alert alert-primary'>تم التعديل بنجاح</div>";
        header( "Refresh:1; url=../");
      }
    }


    ?>
    </head>
    <body class="bg-dark text-light">

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>تعديل الحساب</h1>
          </div>
          <div class="col-md-12 p-5 shadow">
            <form action="" method="post">
              <div class="form-group">
                <label>اسم المستخدم</label>
                <input name="username" minlength="3" maxlength="30" value="<?php if(isset($username)){echo $username;}else{echo $user['user'];}  ?>" type="text" required class="form-control" />
              </div>
              <div class="form-group">
                <label>كلمة السر</label>
                <input name="password" minlength="5" maxlength="30" value="<?php if(isset($password)){echo $password;}  ?>" type="password" class="form-control"  />
              </div>
              <div class="form-group">
                <label>تأكيد كلمة السر</label>
                <input name="confirm_password" minlength="5" maxlength="30" value="<?php if(isset($confirm_password)){echo $password;}  ?>"  type="password" class="form-control"  />
              </div>
              <div class="form-group">
                <input type="submit" name="edit" value="تعديل" class="form-control btn btn-primary" />
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php include '../components/footer.php'; ?>
    </body>
    </html>
<?php

}else{
  header("location:../index.php");
}
?>
