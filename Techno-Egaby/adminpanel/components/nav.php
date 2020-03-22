<nav class="navbar navbar-expand-md navbar-dark font-weight-bold fixed-top bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/adminpanel/') echo 'active'?>" href="/adminpanel/">الفيديوهات <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/adminpanel/edit-admin/') echo 'active'?>" href="/adminpanel/edit-admin">تعديل الحساب</a>
      </li>
    </ul>
    <a class="nav-link text-light" href="/adminpanel/logout.php">تسجيل الخروج</a>
  </div>
</nav>
