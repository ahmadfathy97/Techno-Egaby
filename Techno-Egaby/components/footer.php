<div class="loader" id="loader">
  <div class="spinner"></div>
</div>

<script src="../public/script/jquery.js"></script>
<script src="../public/script/bootstrap.min.js"></script>
<script src="../public/script/main.js"></script>
<script>
  let loader = document.getElementById('loader');
  window.onload = function () {
    loader.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
</script>
