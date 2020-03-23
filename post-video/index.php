<?php
  include '../components/header.php';
  include '../connDB.php';

  if (isset($_POST['upload'])) {
    $vid_title    = filter_var($_POST['vid_title'],FILTER_SANITIZE_STRING);
    $vid_link     = filter_var($_POST['vid_link'],FILTER_SANITIZE_URL);
    $vid_desc     = filter_var($_POST['vid_desc'],FILTER_SANITIZE_STRING);
    $name       = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $call       = filter_var($_POST['call'],FILTER_SANITIZE_STRING);

    $err = array();
    //Valdate video title
    if (empty($vid_title)) {
      $err[]= "the title video must write ";
    }elseif (strlen($vid_title)<3) {
      $err[]= "the title video must more than 3 char ";
    }elseif (strlen($vid_title)>=100) {
      $err[]= "the title video must leth than 100 char ";
    }
    //validate URL  video
    if (empty($vid_link)) {
      $err[]= "the URL  video must write ";
     }else{
      if (filter_var($_POST['vid_link'],FILTER_VALIDATE_URL)==false) {
        $err[]="the video link is invald";
      }else{
        $host    = parse_url($_POST['vid_link'],PHP_URL_HOST);
        $protcol = parse_url($_POST['vid_link'],PHP_URL_SCHEME);
        if (($host != "www.youtube.com" && $host != "youtu.be" )|| $protcol !="https" ) {
          $err[]= "link not youtube";
        }else{
          parse_str(parse_url($_POST['vid_link'],PHP_URL_QUERY),$arr);
          if (!isset($arr['v'])) {
            $err[]= "link not id video ";
          }
        }
      }

    }

    //validate description video
    if (strlen($vid_desc)<3 && !empty($vid_desc)) {
      $err[]= "the description video must more than 3 char ";
    }elseif (strlen($vid_desc)>=500) {
      $err[]= "the description video must leth than 500 char ";
    }

    //Valdate name
    if (empty($name)) {
      $err[]= "the name  video must write ";
    }elseif (strlen($name)<3) {
      $err[]= "the name must more than 3 char ";
    }elseif (strlen($name)>=50) {
      $err[]= "the name must leth than 50 char ";
    }

    //validate call
    if (strlen($call)<3 && !empty($call)) {
      $err[]= "the call must more than 3 char ";
    }elseif (strlen($call)>=500) {
      $err[]= "the call video must leth than 300 char ";
    }

    if (!empty($err)) {
      foreach ($err as $msgError) {
        echo '<div class="alert alert-danger">' . $msgError . '</div>';
      }
    }else{
      //insert DB
      $ins = "INSERT INTO video (vid_title , vid_url , vid_desc , name , call_me , accept)
                VALUES('$vid_title' , '$vid_link' , '$vid_desc ','$name','$call' ,0 )";
      $q_ins = $conn->prepare($ins);
      $q_ins->execute();
      echo '<div class="alert alert-warning shadow border-warning">شكرا لمساهمتك سيتم مراجعة الفيديو والموافقة عليه في اسرع وقت</div>';
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
                name="vid_title" />
            </div>
            <div class="form-group">
              <label>رابط الفيديو</label>
              <input type="url" required
                oninvalid="this.setCustomValidity('يجب ان يحتوي هذا الحقل على رابط الفيديو')"
                oninput="this.setCustomValidity('')"
                class="form-control"
                name="vid_link"/>
            </div>
            <div class="form-group">
              <label>وصف الفيديو</label>
              <textarea name="vid_desc" class="form-control" required
                minlength="3"
                maxlength="500"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-500) حرف فقط')"
                oninput="this.setCustomValidity('')"></textarea>
            </div>
            <div class="form-group">
              <label>اسم المشارك</label>
              <input name="name" type="text" required
                minlength="3"
                maxlength="50"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-50) حرف فقط')"
                oninput="this.setCustomValidity('')" class="form-control" />
            </div>
            <div class="form-group">
              <label>روابط التواصل او الهاتف</label>
              <textarea name="call" class="form-control" required
                minlength="3"
                maxlength="500"
                oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-500) حرف فقط')"
                oninput="this.setCustomValidity('')"></textarea>
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
  ?>

</body>
</html>
