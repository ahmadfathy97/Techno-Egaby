<?php
ob_start();
  include '../components/header.php';
  include "../connDB.php";
?>
  <style media="screen">
    .team .col-md-3 div{
      background: #ebebeb !important;
    }
  </style>
</head>
<body>
  <?php include '../components/nav.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title line-bottom text-center">من نحن</h1>
      </div>
      <div class="col-md-12 mt-5 py-5 text-center rounded shadow-lg">
        <div class="info">
          <h2>هذا الموقع جزء من مبادرة تكنو ايجابي</h2>
          <p>مبادرة من قسم تكنولوجيا التعليم بكلية التربية النوعية بجامعة الفيوم، تهدف لتوظيف أدوات ومحتوى التعليم الإلكتروني لخدمة المجتمع</p>
        </div>
        <div class="row team">
          <div class="col-md-3 founder">
            <div class="m-2 rounded shadow py-5 px-1 bg-warning">
              <h3>د/ احمد محمود صالح</h3>
              <p>مؤسس المبادرة</p>
              <a href="https://www.facebook.com/ahmedsaleh1988" target="_blank" rel="noopener">facebook</a>
            </div>
          </div>
          <div class="col-md-3 founder">
            <div class="m-2 rounded shadow py-5 px-1 bg-warning">
              <h3>د/ رباب صلاح احمد</h3>
              <p>مؤسس المبادرة</p>
              <a href="https://www.facebook.com/dr.rsa" target="_blank" rel="noopener">facebook</a>
            </div>
          </div>

          <div class="col-md-3 founder">
            <div class="m-2 rounded shadow py-5 px-1 bg-warning">
              <h3>محمود عبدالفضيل</h3>
              <p>بناء الموقع</p>
              <a href="https://www.facebook.com/MAbdelfadiel" target="_blank" rel="noopener">facebook</a>
            </div>
          </div>
          <div class="col-md-3 founder">
            <div class="m-2 rounded shadow py-5 px-1 bg-warning">
              <h3>احمد فتحي</h3>
              <p>بناء الموقع</p>
              <a href="https://www.facebook.com/AhmadFathy97"  target="_blank" rel="noopener">facebook</a>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-5">
          <div class="links d-flex alig-items-center justify-content-center flex-wrap">
            <a class="m-2 text-primary font-weight-bold" href="https://www.facebook.com/TechnoEgaby/"
            target="_blank"
            rel="noopener">facebook page</a>
            <a class="m-2 text-primary font-weight-bold" href="https://www.facebook.com/groups/TechnoEgaby/"
            target="_blank"
            rel="noopener">facebook group</a>
            <a class="m-2 text-primary font-weight-bold"
            href="https://www.youtube.com/channel/UCI1dwgs1OBeNr-2BFrspfGg"
            target="_blank"
            rel="noopener">youtube</a>
            <a class="m-2 text-primary font-weight-bold"
            href="mailto:techno.egaby@gmail.com"
            target="_blank"
            rel="noopener">techno.egaby@gmail.com</a>

          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include '../components/footer.php';
ob_end_flush();
  ?>
</body>
</html>
