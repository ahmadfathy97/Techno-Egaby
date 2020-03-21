<?php include '../components/header.php'; ?>
</head>
<body>
  <?php include '../components/nav.php' ?>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center m-3 title line-bottom"> تعديل الفيديو</h1>
    </div>
    <div class="col-md-12">
      <div class="form-container border rounded shadow p-5">
        <form class="" action="" method="post">
          <div class="form-group">
            <label>عنوان الفيديو</label>
            <input type="text" required
              oninvalid="this.setCustomValidity('يجب عليك ملءهذا الحقل')"
              oninput="this.setCustomValidity('')"
              class="form-control"
              name="vid_title" />
          </div>
          <div class="form-group">
            <label>رابط الفيديو</label>
            <input type="url" required
              oninvalid="this.setCustomValidity('يجب ان يحتوي هذا الحقل على رابط الفيديو')"
              oninput="this.setCustomValidity('')"
              class="form-control"
              name="vid_link"/>
          </div>
          <div class="form-group">
            <label>وصف الفيديو</label>
            <textarea name="vid_desc" class="form-control" required
              oninvalid="this.setCustomValidity('يجب عليك ملءهذا الحقل')"
              oninput="this.setCustomValidity('')"></textarea>
          </div>
          <div class="form-group">
            <label>اسم المشارك</label>
            <input name="name" type="text" required
              oninvalid="this.setCustomValidity('يجب عليك ملءهذا الحقل')"
              oninput="this.setCustomValidity('')" class="form-control" />
          </div>
          <div class="form-group">
            <label>روابط التواصل او الهاتف</label>
            <textarea name="call" class="form-control" required
              oninvalid="this.setCustomValidity('يجب عليك ملءهذا الحقل')"
              oninput="this.setCustomValidity('')"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="upload" value="تعديل" class="form-control btn btn-primary" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
  include '../components/footer.php';
?>
</body>
</html>
