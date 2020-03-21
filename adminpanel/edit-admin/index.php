<?php include '../components/header.php'; ?>
</head>
<body class="bg-dark text-light">
  <?php include '../components/nav.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>تعديل الحساب</h1>
      </div>
      <div class="col-md-12 p-5 shadow">
        <form action="" method="post">
          <div class="form-group">
            <label>اسم المستخدم</label>
            <input name="username" type="text" required class="form-control" />
          </div>
          <div class="form-group">
            <label>كلمة السر</label>
            <input name="password" type="password" class="form-control" required />
          </div>
          <div class="form-group">
            <label>تأكيد كلمة السر</label>
            <input name="confirm-password" type="password" class="form-control" required />
          </div>
          <div class="form-group">
            <input type="submit" name="upload" value="دخول" class="form-control btn btn-primary" />
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include '../components/footer.php'; ?>
</body>
</html>
