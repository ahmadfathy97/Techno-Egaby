<?php
ob_start();
  include '../components/header.php';
  if (isset($_POST['send'])) {
  $email      = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
  $msg_title  = filter_var($_POST['msg_title'],FILTER_SANITIZE_STRING);
  $msg        = filter_var($_POST['msg'],FILTER_SANITIZE_STRING);
  $from='from: '.$email.'/r/n';
  $my_email="mahmoudhasan509@gmail.com";

  $err = array();
  if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false) {
    $err[]="بريد الكترونى غير صالح";
  }
  //validate  title msg
  if (empty($msg_title)) {
   $err[]="قم بكتابة عنوان الرساله";
  }elseif (strlen($msg_title)<3) {
    $err[]="يجب ان يكون عنوان الرساله من 3 احرف الى اقل من 70 حرف";
  }elseif (strlen($msg_title)>70) {
    $err[]="يجب ان يكون عنوان الرساله من 3 احرف الى اقل من 70 حرف";
  }
  //validate msg
  if(empty($msg)) {
   $err[]="قم بكتابةالرساله";
  }elseif (strlen($msg_title)<3) {
    $err[]="يجب ان يكون الرساله من 3 احرف الى اقل من 900 حرف";
  }elseif (strlen($msg_title)>900) {
    $err[]="يجب ان يكون عنوان الرساله من 3 احرف الى اقل من 900 حرف";
  }

  if (!empty($err)) {
    foreach ($err as $msgError) {
      echo '<div class="alert alert-danger">' . $msgError . '</div>';
    }
  }else{
    mail($my_email , $msg_title , $msg  , $from);
    echo '<div class="alert alert-warning shadow border-warning">تم ارسال الرسالة بنجاح سيتم الرد عليك في اسرع وقت </div>';
  }
}
?>
  <link rel="stylesheet" href="../public/style/main.css">
</head>
<body>
  <?php
    include '../components/nav.php';
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center m-3 title line-bottom">كتابة شكوى او مقترح</h1>
      </div>
      <div class="col-md-12">
        <div class="form-container border rounded shadow p-5">
          <form class="" action="" method="post">
            <div class="form-group">
              <label>البريد الالكتروني</label>
              <input name="email" type="email" required
                oninvalid="this.setCustomValidity('يجب ان يحتوي هذا الحقل على بريد الكتروني')"
                oninput="this.setCustomValidity('')"
                class="form-control" />
            </div>
            <div class="form-group">
              <label> عنوان الاشكوى او المفترح</label>
              <input name ="msg_title" type="text" required
                minlength="3"
                maxlength="70"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-70) حرف فقط')"
                oninput="this.setCustomValidity('')"
                class="form-control" />
            </div>
            <div class="form-group">
              <label>الشكوى او المقترح</label>
              <textarea name="msg" required
                minlength="3"
                maxlength="900"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-900) حرف فقط')"
                oninput="this.setCustomValidity('')"
                class="form-control" ></textarea>
            </div>
            <div class="form-group">
              <input type="submit" name="send" value="إرسال" class="form-control btn btn-warning" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php
    include '../components/footer.php';
ob_end_flush();
  ?>
</body>
</html>
