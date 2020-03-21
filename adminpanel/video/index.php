<?php include '../components/header.php'; ?>
</head>
<body>
  <?php include '../components/nav.php' ?>
  <div class="container">

    <div class="row mt-5">

      <div class="col-md-12">
        <div class="video m-1 p-3 border shadow">
          <h2 class="video-title">عنوان الفيديو</h2>
          <p class="small-desc">وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو وصف الفيديو </p>
          <h3 class="">صاحب الفيديو</h3>
          <p class=""> معلومات الاتصال معلومات الاتصال معلومات الاتصال معلومات الاتصال معلومات الاتصال</p>
          <iframe src="https://www.youtube.com/embed/UHp2sJLscGk" class="m-1" border-0 width="100%" style="height:60vh" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <div class="buttons">
            <a href="#" class="btn btn-danger float-right" role="button" data-toggle="modal" data-target="#exampleModal">حذف</a>
            <a href="/adminpanel/edit-video/" class="btn btn-info" role="button">تعديل</a>
            <a href="#" class="btn btn-success" role="button">قبول</a>
            <a href="#" class="btn btn-warning" role="button">تعليق النشر</a>
          </div>
        </div>
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
          <a href="#" type="button" class="btn btn-danger" data-dismiss="modal">حذف</a>
        </div>
      </div>
    </div>
  </div>
  <?php include '../components/footer.php'; ?>
</body>
</html>
