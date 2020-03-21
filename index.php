<?php
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
          طريقة المساهمة
        </button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">صاحب الفيديو</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <iframe src="https://www.youtube.com/embed/UHp2sJLscGk" class="m-1" border-0 width="100%" style="height:60vh" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">إغلاق</button>
        </div>
      </div>
    </div>
  </div>

  <?php
    include './components/footer.php';
  ?>
  <script src="./public/script/home.js"></script>
</body>
</html>
