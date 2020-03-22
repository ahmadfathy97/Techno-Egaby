<?php
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
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center m-3 title line-bottom">الفيديوهات</h1>
      </div>
    </div>
    <div class="row mt-5">
      <?php
      foreach ($videos as $video) {
        echo '
        <div class="col-md-6">
          <div class="video m-1 p-3 border shadow">
            <h2 class="video-title">'.$video['vid_title'].'</h2>';
            if (strlen($video['vid_desc'])<30) {
                echo '<p class="small-desc">'.$video['vid_desc'].'</p>';
              }else{
                $desc=substr($video['vid_desc'], 0,30);
                echo '<p class="small-desc">'.$desc.'...</p>';
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
  ?>
</body>
</html>
