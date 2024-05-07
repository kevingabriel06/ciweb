<!-- register.php -->
  <div class="row justify-content-center">
    <div class="col-md-4">
      <form action="<?php echo base_url('auth/register');?>" method="POST" class="form-horizontal">
        <h2 class="text-center">Register</h2>
        <hr>
        
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <div class="form-group">
          <label for="username" class="control-label">Username:</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="password" class="control-label">Password:</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div class="form-group text-center"> <!-- Added text-center class -->
          <p class="text-center">Already have an account? <a href="<?php echo base_url('auth/login');?>">Login here</a></p>
        </div>
      </form>
    </div>
  </div>
