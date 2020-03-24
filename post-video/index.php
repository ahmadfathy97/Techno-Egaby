<?php
ob_start();
  include '../components/header.php';
  include '../connDB.php';

  if (isset($_POST['upload'])) {
    $vid_title    = filter_var($_POST['vid_title'],FILTER_SANITIZE_STRING);
    $vid_link     = filter_var($_POST['vid_link'],FILTER_SANITIZE_URL);
    $vid_desc     = filter_var($_POST['vid_desc'],FILTER_SANITIZE_STRING);
    $name       = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $err = array();
    //Valdate video title
    if (empty($vid_title)) {
      $err[]= "اكتب عنوان الفيديو ";
    }elseif (strlen($vid_title)<3) {
      $err[]= "يجب ان لايقل عنوان الفيديو عن 3 احرف ولا يزيد عن 100 ";
    }elseif (strlen($vid_title)>100) {
      $err[]= "يجب ان لايقل عنوان الفيديو عن 3 احرف ولا يزيد عن 100 ";
    }
    //validate URL  video
    if (empty($vid_link)) {
      $err[]= "قم بكتابة لينك الفيديو";
     }else{
      if (filter_var($_POST['vid_link'],FILTER_VALIDATE_URL)==false) {
        $err[]="لينك غير صالح";
      }else{
        $host    = parse_url($_POST['vid_link'],PHP_URL_HOST);
        $protcol = parse_url($_POST['vid_link'],PHP_URL_SCHEME);
        if (($host != "www.youtube.com" && $host != "youtu.be" )|| $protcol !="https" ) {
          $err[]= "من فضلك تأكد انه لينك يوتيوب";
        }else{
          parse_str(parse_url($_POST['vid_link'],PHP_URL_QUERY),$arr);
          if (!isset($arr['v'])) {
            $err[]= "لينك غير صالح";
          }
        }
      }

    }

    //validate description video
    if (strlen($vid_desc)<3 && !empty($vid_desc)) {
      $err[]= "وصف الفيدو يجب ان يكون من 3 الى 500 حرف";
    }elseif (strlen($vid_desc)>500) {
      $err[]= "وصف الفيدو يجب ان يكون من 3 الى 500 حرف";
    }

    //Valdate name
    if (empty($name)) {
      $err[]= "قم بكتابة اسم المشارك فى الفيديو";
    }elseif (strlen($name)<3) {
      $err[]= "اسم المشارك يجب ان يكون من 3 الى اقل من 50 حرف";
    }elseif (strlen($name)>=50) {
      $err[]= "اسم المشارك يجب ان يكون من 3 الى اقل من 50 حرف";
    }

    if (!empty($err)) {
      foreach ($err as $msgError) {
        echo '<div class="alert alert-danger">' . $msgError . '</div>';
      }
    }else{
      //insert DB
      $ins = "INSERT INTO video (vid_title , vid_url , vid_desc , name  , accept)
                VALUES('$vid_title' , '$vid_link' , '$vid_desc ','$name' ,0 )";
      $q_ins = $conn->prepare($ins);
      $q_ins->execute();
      echo '<div class="alert alert-warning shadow border-warning">شكرا لمساهمتك سيتم مراجعة الفيديو والموافقة عليه في اسرع وقت</div>';
      header( "Refresh:4; url=../videos");
    }

  }
?>
</head>
<body>
  <?php
    include '../components/nav.php';
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center m-3 title line-bottom"> نشر فيديو</h1>
      </div>
      <div class="col-md-12">
        <div class="form-container border rounded shadow p-5">
          <form class="" action="" method="post">
            <div class="form-group">
              <label>عنوان الفيديو</label>
              <input type="text" required
                minlength="3"
                maxlength="100"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-100) حرف فقط')"
                oninput="this.setCustomValidity('')"
                class="form-control"
                name="vid_title"
                value="<?php if(isset($vid_title)){echo $vid_title ;} ?>" />
            </div>
            <div class="form-group">
              <label>رابط الفيديو</label>
              <input type="url" required
                oninvalid="this.setCustomValidity('يجب ان يحتوي هذا الحقل على رابط الفيديو')"
                oninput="this.setCustomValidity('')"
                class="form-control"
                name="vid_link"
                value="<?php if(isset($vid_link)){echo$vid_link ;} ?>"/>
            </div>
            <div class="form-group">
              <label>وصف الفيديو</label>
              <textarea name="vid_desc" class="form-control" required
                minlength="3"
                maxlength="500"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-500) حرف فقط')"
                oninput="this.setCustomValidity('')"><?php if(isset($vid_desc)){echo $vid_desc;} ?></textarea>
            </div>
            <div class="form-group">
              <label>اسم المشارك</label>
              <input name="name" type="text" required
                minlength="3"
                maxlength="50"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-50) حرف فقط')"
                oninput="this.setCustomValidity('')" class="form-control"
                value="<?php if(isset($name)){echo$name ;} ?>" />
            </div>
            <div class="form-group">
              <input type="submit" name="upload" value="نشر" class="form-control btn btn-warning" />
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
