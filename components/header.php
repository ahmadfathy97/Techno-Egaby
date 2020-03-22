<?php

  $title;
  if($_SERVER['REQUEST_URI'] === '/videos/'){
    $title = 'الفيديوهات';
  } else if($_SERVER['REQUEST_URI'] === '/post-video/'){
    $title = 'نشر فيديو';
  } else if($_SERVER['REQUEST_URI'] === '/complainments/'){
    $title = 'الشكاوى والمقترحات';
  } else if($_SERVER['REQUEST_URI'] === '/about/'){
    $title = 'من نحن';
  } else{
    $title = 'Techno-Egaby';
  }
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="../public/style/bootstrap.min.css">
  <link rel="stylesheet" href="../public/style/main.css">
