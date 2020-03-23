<?php
ob_start();
session_start();
include '../components/header.php';
include '../../connDB.php';

if (isset($_SESSION['user'])) {
 header('location:../');
}
if (isset($_POST['login'])) {
  $user=filter_var($_POST['user'],FILTER_SANITIZE_STRING);
  $pass=sha1(filter_var($_POST['pass'],FILTER_SANITIZE_STRING));
  $q_accsess_user=$conn->prepare("SELECT * FROM users
              WHERE user='$user' AND pass='$pass'");
  $q_accsess_user->execute();
  $count_accsess_user=$q_accsess_user->rowCount();
  if($count_accsess_user==1){
    $_SESSION['user']=$user;
    header('location:../');
  }else{
    echo '<div class="alert alert-danger">تأكد ان اسم المستخدم والرقم السرى صحيح</div>';
  }
}


?>
</head>
<body class="bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>تسجيل الدخول</h1>
      </div>
      <div class="col-md-12 p-5 shadow">
        <form action="" method="post">
          <div class="form-group">
            <label>اسم المستخدم</label>
            <input name="user" type="text" oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل ')"
            oninput="this.setCustomValidity('')" required class="form-control" />
          </div>
          <div class="form-group">
            <label>كلمة السر</label>
            <input name="pass" type="password"  oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل ')"
            oninput="this.setCustomValidity('')" class="form-control" required />
          </div>
          <div class="form-group">
            <input type="submit" name="login" value="دخول" class="form-control btn btn-primary" />
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include '../components/footer.php'; 
ob_end_flush();
  ?>
</body>
</html>
