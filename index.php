<?php
ob_start();
  include './components/header.php';
   include "connDB.php";
?>
  <link rel="stylesheet" href="./public/style/home.css">

</head>
<body>
  <?php
    include './components/nav.php';
  ?>
  <div class="header">
    <div class="info-container">
      <div class="info">
        <h1 class="text-center text-dark title font-weight-bold">تكنو-إيجابي (Techno - Egaby)</h1>
        <p class="text-center text-secondary" id="desc"></p>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
          طريقة المشاركه
        </button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">كيفية المساهمة</h5>
          <button type="button" id="close-vid-1" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <iframe id="home-video" src="https://www.youtube.com/embed/UHp2sJLscGk?enablejsapi=1&html5=1" class="m-1" border-0 width="100%" style="height:60vh" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" id="close-vid-2" class="btn btn-warning" data-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>

  <?php
    include './components/footer.php';
ob_end_flush();
  ?>
  <script src="https://www.youtube.com/player_api"></script>
  <script src="./public/script/home.js"></script>
</body>
</html>
