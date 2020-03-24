<?php
ob_start();
  include '../connDB.php';
  include '../components/header.php';
?>
  <link rel="stylesheet" href="./style/videos.css">
</head>
<body>
  <?php
    include '../components/nav.php';
    $allVaideo=$conn->prepare("SELECT * FROM video WHERE accept=1");
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
            if (strlen($video['vid_title']) <30) {
              echo '<h2 class="video-title">'.$video['vid_title'].'</h2>';
            }else{
              $title = substr($video['vid_title'], 0,30);
              echo '<h2 title="'.$video['vid_title'].'" class="video-title">'.$title.'...</h2>';
            }


            if (strlen($video['vid_desc']) <45) {
                echo '<p class="small-desc">'.$video['vid_desc'].'</p>';
              }else{
                $desc=substr($video['vid_desc'], 0,45);
                echo '<p title="'.$video['vid_desc'] .'" class="small-desc">'.$desc.'...</p>';
              }
            echo '
            <a href="../single-video?id='.$video['id'].'" class="btn btn-warning" role="button">مشاهدة الفيديو</a>
          </div>
        </div>';

        }
      ?>


    </div>
  </div>
  <?php
    include '../components/footer.php';
ob_end_flush();
  ?>
</body>
</html>
