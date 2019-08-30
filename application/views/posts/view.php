<div class="container">
<?php $this->load->view('templates/ms'); ?>
    <h2><?=$title?></h2>
    <small class="post-date"><?php echo $post->created_at ?></small>
    <img class="img-thumbnail img-fluid" src="<?php echo site_url().'assets/img/posts/'. $post->post_image ?>" alt="<?=$post->post_image?>">
    <div class="post-body">    
    <?php echo $post->body ?>
    </div>

    <?php if($this->session->userdata('user_id') == $post->user_id): ?>
    <hr>
    <a class="btn btn-secondary float-left" href="<?php echo base_url().'posts/edit/'.$post->slug ?>" >Edit</a>
    <?php echo form_open('posts/delete/'.$post->id); ?>
    <input type="submit" value="Delee" class="btn btn-danger">
    <?php echo form_close(); ?>
    <?php endif;?>

    <hr>
    <h3>Comments</h3>
    <?php if($comments): ?>
        <?php foreach($comments as $comment): ?>
            <div class="card card-body bg-light">
                <h5><?php echo $comment->body; ?> [by <strong><?php echo $comment->name; ?></strong>]</h5>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No Comments To Display</p>
    <?php endif; ?>
    <hr>
    <h3>Add Comment</h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/create/'.$post->id); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body"cols="30" rows="5" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post->slug; ?>">
    <input type="submit" value="Submit" class="btn btn-primary">
    <?php echo form_close(); ?>
    
</div>
<br>