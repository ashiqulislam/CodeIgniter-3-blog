<div class="container">
<?php $this->load->view('templates/ms'); ?>
<h2><?=$title?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
<?php echo form_hidden('id', $post->id); ?>
  <div class="form-group">
    <label>Title</label>
    <?php echo form_input('title', $post->title, 'class="form-control"'); ?>
  </div>
  <div class="form-group">
  <label>Body</label>
  <textarea id="editor" class="form-control" name="body" id="" cols="30" rows="10"><?php echo $post->body; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php
      foreach ($categories as $cat) {
          if( $cat->id == $post->category_id){
            echo '<option  value="'.$cat->id.'" selected>'.$cat->name.'</option>';
          } else{
            echo '<option value="'.$cat->id.'">'.$cat->name.'</option>';
          }          
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php echo form_close(); ?>

</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );
</script>