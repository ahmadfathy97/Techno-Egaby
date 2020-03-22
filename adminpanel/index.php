<?php
session_start();
if (isset($_SESSION['user'])) {
  include './components/header.php';
  include "../connDB.php";
  include './components/nav.php';
  echo '<p class="alert alert-info" >welcome <b>'.$_SESSION['user'].'</b></div>';
  $allVaideo=$conn->query("SELECT * FROM video ");
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center m-3 title line-bottom">الفيديوهات</h1>
        </div>
      </div>

      <div class="row mt-5">
        <?php
        foreach ($allVaideo as $video) {
          echo '
          <div class="col-md-6">
            <div class="video m-1 p-3 border shadow">
              <h2 class="video-title">'.$video['vid_title'].'</h2>
              <p class="small-desc">'.$video['vid_desc'].'</p>
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

  <?php include './components/footer.php'; ?>
</body>
</html>
