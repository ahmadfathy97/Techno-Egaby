<?php
ob_start();
  include '../components/header.php';
  include '../connDB.php';
?>
  <link rel="stylesheet" href="./style/single-video.css">
</head>
<body>
  <?php
    include '../components/nav.php';
  ?>

<?php

if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
  $id_video = $_GET['id'];
  $allVaideo=$conn->prepare("SELECT * FROM video WHERE id = '$id_video'");
  $allVaideo->execute();
  $video = $allVaideo->fetch();
  $count =  $allVaideo->rowCount();

  // fetch comments
  $allcomments=$conn->prepare("SELECT * from comment  WHERE  id_video= '$id_video'");
  $allcomments->execute();
  $comments = $allcomments->fetchAll();
  if ($count != 1 || $video['accept']==0) {
    echo '<div class="alert alert-danger">لا يوجد هذا الفيديو</div>';
  }else{
    parse_str(parse_url($video['vid_url'],PHP_URL_QUERY),$arr);
    echo '
    <div class="container bg-light">
      <div class="row">
        <div class="col-md-12" style="height: 80vh">
          <iframe src="https://www.youtube.com/embed/'.$arr['v'].'" class="mt-1 m-1" border-0 width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-12 p-2 mt-2 mb-2 border">
          <h2 class="title">'.$video['vid_title'].'</h2>
          <p>'.$video['vid_desc'].'</p>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
            صاحب الفيديو
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h2 class="m-2">التعليقات</h2>
        </div>
          <div class="col-md-12 comments-container pt-3 pb-3 border">
            <ul class="comments" id="comments">';
            foreach ($comments as $comment) {
              echo'
              <li class="p-2 rounded m-1">
                <h3>'.$comment['name'].'</h3>
                <p>'.$comment['comment'].'</p>
              </li>';
            }
        echo'
        </ul>
      </div>
      </div>

      <div class="row">

        <div class="col-md-12 border p-3">
          <div class="err-container"></div>
          <div class="form-group">
            <label>الاسم</label>
            <input type="text" id="comment-owner" class="form-control">
          </div>
          <div class="form-group">
            <label>التعليق</label>
            <textarea id="comment-body" class="form-control"></textarea>
          </div>
          <button class="btn btn-warning" id="add-comment">إضافة تعليق</button>
        </div>
      </div>




      <!------------------------>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel">تم نشر هذا الفيديو بواسطة</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            '.$video['name'].'
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">إغلاق</button>
            </div>
          </div>
        </div>
      </div>

    </div>';
  }
}else{
  header('location:../');
}


?>



  <?php
    include '../components/footer.php';
ob_end_flush();
  ?>
  <script src="./script/add-comment.js"></script>

</body>
</html>
