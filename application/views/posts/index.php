<div class="container">
<?php $this->load->view('templates/ms'); ?>
<h2><?=$title?></h2>

<?php foreach ($posts as  $post) :?>
<h3><?php echo $post->title ?></h3>
<small class="post-date"><?php echo $post->created_at ?> in <strong><?php echo $post->name; ?></strong></small>
<div class="row ">
    <div class="col-md-3">
    <img  class="img-thumbnail img-fluid" src="<?php echo site_url().'assets/img/posts/'. $post->post_image ?>" alt="<?php echo $post->post_image ?>">
    </div>
    <div class="col-md-9">
        <p><?php echo word_limiter($post->body, 60) ?></p>
        <p><a class="btn btn-secondary" href="<?php echo site_url('/posts/'.$post->slug) ?>">Read More</a></p>
    </div>
</div>

<?php endforeach; ?>
<div class="pagination-links text-center">
<?php echo $this->pagination->create_links(); ?>
</div>


</div>