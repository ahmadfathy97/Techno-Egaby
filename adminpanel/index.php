<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
  include './components/header.php';
  include "../connDB.php";
  include './components/nav.php';
   echo '<p class="alert alert-info" >welcome <b>'.$_SESSION['user'].'</b></div>';
  $allVaideo=$conn->prepare("SELECT * FROM video");
  $allVaideo->execute();
  $videos = $allVaideo->fetchAll();
  $count = $allVaideo->rowCount();
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
        if ($count==0) {
          echo '<h1 class="text-center m-3 title line-bottom">لايوجد فيديوهات لعرضها </h1>';
        }else{
          echo '<h1 class="text-center m-3 title line-bottom">الفيديوهات</h1>';
        }

        ?>
        </div>
      </div>

      <div class="row mt-5">
        <?php
        foreach ($videos as $video) {
          echo '
          <div class="col-md-6">
            <div class="video m-1 p-3 border shadow">';
            if ($video['accept']==0) {
              echo ' <span class="bg-danger text-light px-3 py-1 rounded">يحتاج الى موافقه</span>';
            }else{
              echo ' <span class="bg-success text-light px-3 py-1 rounded">تمت المواقه عليه</span>';
            }
            if (strlen($video['vid_title'])<20) {
              echo '<h2 class="video-title">'.$video['vid_title'].'</h2>';
            }else{
              $title = substr($video['vid_title'], 0,20);
              echo '<h2 class="video-title">'.$title.'...</h2>';
            }
              if (strlen($video['vid_desc'])<30) {
                echo '<p class="small-desc">'.$video['vid_desc'].'</p>';
              }else{
                $desc=substr($video['vid_desc'], 0,30);
                echo '<p class="small-desc">'.$desc.'...</p>';
              }
              echo'

              <a href="/adminpanel/video/?id='.$video['id'].'" class="btn btn-dark" role="button">الذهاب الى الفيديو</a>
            </div>
          </div>
          ';

        }
        ?>





      </div>
    </div>



  <?php
}else{
  header('location:login');
}


?>
</head>
<body>

  <?php include './components/footer.php';

ob_end_flush(); ?>
</body>
</html>
