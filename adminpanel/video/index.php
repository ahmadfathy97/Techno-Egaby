<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
  include '../components/header.php';
  include '../../connDB.php';
  if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
    $id_video = $_GET['id'];
    //accept video
    if (isset($_GET['accp'])) {
      $update =$conn->prepare("UPDATE video SET accept= 1  WHERE id='$id_video'") ;
      $update->execute();
      echo '<div class="alert alert-success shadow border-warning">تمت الموافقه على هذا الفيديو</div>';
      header( "Refresh:1; url=?id=$id_video");
    }
    //Unaccept video
    if (isset($_GET['unaccp'])) {
      $update =$conn->prepare("UPDATE video SET accept= 0  WHERE id='$id_video'") ;
      $update->execute();
      echo '<div class="alert alert-success shadow border-warning">تم تعليق نشر هذا الفيديو</div>';
      header( "Refresh:1; url=?id=$id_video");
    }
    //Delete video
    if (isset($_GET['del'])) {
        $del = $conn->prepare("DELETE FROM video WHERE id = '$id_video'");
        $del->execute();
        echo '<div class="alert alert-success shadow border-warning">تم حذف هذا الفيديو بنجاح</div>';
        header( "Refresh:1; url=../");
    }
    //delete Comments

    if (isset($_GET['delComm'])&&isset($_GET['idComm'])) {
      $id_comment=$_GET['idComm'];
      $delComm = $conn->prepare("DELETE FROM comment WHERE id = '$id_comment'");
      $delComm->execute();
      //header( "Refresh:1; url=?id=$id_video");
    }

    $Allvideo=$conn->prepare("SELECT * FROM video WHERE id = '$id_video' ");
    $Allvideo->execute();
    $video=$Allvideo->fetch();
    $count =  $Allvideo->rowCount();
    if ($count != 1) {
      echo '<div class="alert alert-danger">لا يوجد هذ الفيديو</div>';
    }else{
      ?>
      </head>
<body>
  <?php
  include '../components/nav.php';
   parse_str(parse_url($video['vid_url'],PHP_URL_QUERY),$arr);
  echo '
    <style>
      .comments li{
        list-style-type: none;
        background: #eee
      }
      .comments li:nth-of-type(odd){
        background: #fee59a
      }
    </style>
    <div class="container">

      <div class="row mt-5">

        <div class="col-md-12">
          <div class="video m-1 p-3 border shadow">
            <h2 class="video-title">'.$video['vid_title'].'</h2>
            <p class="small-desc">'.$video['vid_desc'].'</p>
            <h3 class="">'.$video['name'].'</h3>

            <iframe src="https://www.youtube.com/embed/'.$arr['v'].'" class="m-1" border-0 width="100%" style="height:60vh" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="buttons">
              <a href="#" class="btn btn-danger float-right m-1" role="button" data-toggle="modal" data-target="#exampleModal">حذف</a>
              <a href="/adminpanel/edit-video/?id='.$video['id'].'" class="btn btn-info m-1" role="button">تعديل</a>';
              if ($video['accept']==0) {
                echo '<a href="?accp&id='.$video['id'].'" class="btn btn-success m-1" role="button">قبول</a>';
              }else{
                echo '<a href="?unaccp&id='.$video['id'].'" class="btn btn-warning m-1" role="button">تعليق النشر</a>';
              }



      echo'   </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h2 class="m-2">التعليقات</h2>
        </div>
          <div class="col-md-12 comments-container pt-3 pb-3 border">
            <ul class="comments" id="comments">';
             // fetch comments
              $allcomments=$conn->prepare("SELECT * from comment  WHERE  id_video= '$id_video'");
              $allcomments->execute();
              $comments = $allcomments->fetchAll();
            foreach ($comments as $comment) {
              echo'
              <li class="p-2 rounded m-1">
                <h3>'.$comment['name'].'</h3>
                <p>'.$comment['comment'].'</p>
                <button data-id="' .$comment['id_video'] .'" data-idcomm="'. $comment['id'] .'" class="btn btn-danger delete-comment">حذف</button>
              </li>';
            }
        echo'
        </ul>
      </div>
      </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تأكيد</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-danger">
              هل انت متأكد من حذف هذا الفيديو؟؟
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            <a href="?del&id='.$video['id'].'" type="button" class="btn btn-danger">حذف</a>
          </div>
        </div>
      </div>
    </div>';

    }
  }else{
    echo 'error :(';
  }

}else{
  header('location:login');
}

?>

  <?php include '../components/footer.php'; 
ob_end_flush();
?>
  <script src="./script/deleteComment.js"></script>
</body>
</html>
