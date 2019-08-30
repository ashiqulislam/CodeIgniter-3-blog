<div class="container">
<?php $this->load->view('templates/ms'); ?>
    <h2><?=$title?></h2>

<ul class="list-group">
<?php
foreach ($categories as  $cat) { ?>
  <li class="list-group-item"><a href="<?php echo site_url('categories/posts/'.$cat->id) ?>"><?php echo$cat->name ?></a>
  <?php if($this->session->userdata('user_id') == $cat->user_id): ?>
  <?php echo form_open('categories/delete/'.$cat->id, ['style'=>'display:inline']); ?>
    <input type="submit" value="[x]" class="btn btn-link text-danger">
    <?php echo form_close(); ?>
    <?php endif; ?>
   </li>
<?php } ?>
 

</ul>
</div>