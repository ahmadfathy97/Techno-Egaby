<nav class="navbar navbar-expand-md navbar-light font-weight-bold fixed-top bg-warning">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/') echo 'active'?>" href="/">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/videos/') echo 'active'?>" href="/videos">الفيديوهات</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/post-video/') echo 'active'?>" href="/post-video">نشر فيديو</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/complainments/') echo 'active'?>" href="/complainments">شكاوى ومقترحات</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] === '/about/') echo 'active'?>" href="/about">من نحن</a>
      </li>
    </ul>
  </div>
</nav>
