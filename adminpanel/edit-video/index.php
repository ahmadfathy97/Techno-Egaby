<?php
session_start();
if (isset($_SESSION['user'])) {
  include '../../connDB.php';
  include '../components/header.php';
  if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
    $id_video = $_GET['id'];
    if (isset($_POST['update'])) {
      $vid_title    = filter_var($_POST['vid_title'],FILTER_SANITIZE_STRING);
      $vid_link     = filter_var($_POST['vid_link'],FILTER_SANITIZE_URL);
      $vid_desc     = filter_var($_POST['vid_desc'],FILTER_SANITIZE_STRING);
      $name       = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
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
          if ($host != "www.youtube.com" || $protcol !="https") {
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
      }elseif (strlen($vid_desc)>=400) {
        $err[]= "the description video must leth than 400 char ";
      }

      //Valdate name
      if (empty($name)) {
        $err[]= "the name  video must write ";
      }elseif (strlen($name)<3) {
        $err[]= "the name must more than 3 char ";
      }elseif (strlen($name)>=50) {
        $err[]= "the name must leth than 50 char ";
      }

      if (!empty($err)) {
        foreach ($err as $msgError) {
          echo '<div class="alert alert-danger">' . $msgError . '</div>';
        }
      }else{
        //Update DB
        $update =$conn->prepare("UPDATE video SET vid_title = '$vid_title',
                              vid_url   ='$vid_link',
                              vid_desc = '$vid_desc' ,
                              name  = '$name' WHERE id='$id_video'") ;
        $update->execute();
        header('location:../video?id='.$id_video.'');
      }

    }
    $Allvideo=$conn->prepare("SELECT * FROM video WHERE id = '$id_video' ");
    $Allvideo->execute();
    $video=$Allvideo->fetch();
    $count =  $Allvideo->rowCount();
    if ($count != 1) {
      echo '<div class="alert alert-danger">هذا الفيديو غير موجود</div>';
    }else{
      ?>
        </head>
          <body>
            <?php include '../components/nav.php' ?>
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="text-center m-3 title line-bottom"> تعديل الفيديو</h1>
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
                        name="vid_title" value="<?php echo $video['vid_title'] ; ?>" />
                    </div>
                    <div class="form-group">
                      <label>رابط الفيديو</label>
                      <input type="url" required
                        oninvalid="this.setCustomValidity('يجب ان يحتوي هذا الحقل على رابط الفيديو')"
                        oninput="this.setCustomValidity('')"
                        class="form-control"
                        name="vid_link"
                        value="<?php echo $video['vid_url'] ; ?>"/>
                    </div>
                    <div class="form-group">
                      <label>وصف الفيديو</label>
                      <textarea name="vid_desc" class="form-control" required
                        oninput="this.setCustomValidity('')"><?php echo $video['vid_desc'] ; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>اسم المشارك</label>
                      <input name="name" value="<?php echo $video['name'] ; ?>" type="text" required
                      minlength="3"
                      maxlength="50"
                      oninvalid="this.setCustomValidity(' يجب عليك ملءهذا الحقل (3-50) حرف فقط')"
                      oninput="this.setCustomValidity('')" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                      <input type="submit" name="update" value="تعديل" class="form-control btn btn-primary" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      <?php
    }
  }

}else{
  header('location:login');
}
include '../components/footer.php';
?>
</body>
</html>
