<div class="container">

<div class="row justify-content-md-center">
        <div class="col-md-4">   
        <h1 class="text-center"><?=$title?></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="<?=set_value('name')?>">
    </div>
    <div class="form-group">
        <label>Zipcode</label>
        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="<?=set_value('zipcode')?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?=set_value('email')?>">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" value="<?=set_value('username')?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="passconf" placeholder="Confirm Password">
    </div>
    
    <input type="submit" value="Submit" class="btn btn-primary btn-block">
<?php echo form_close(); ?>
</div>
    </div>
</div>
