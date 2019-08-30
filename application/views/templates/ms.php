<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-primary" role="alert">
<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('danger')): ?>
<div class="alert alert-danger" role="alert">
<?php echo $this->session->flashdata('danger'); ?>
</div>
<?php endif; ?>