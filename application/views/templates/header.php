<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ciBlog</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="<?php echo base_url() ?>">ciBlog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>posts">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>categories">Categories</a>
      </li>
    </ul>
    <ul class="navbar-nav">
    <?php if(!$this->session->userdata('logged_in')):?>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>users/login">Login</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>users/register">Register</a>
      </li>
    <?php else:?>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>posts/create">Create Post</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>categories/create">Create Category</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>users/logout">Logout</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
  </div>
</nav>

