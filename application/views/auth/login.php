<!-- login.php -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <form action="<?php echo base_url('auth/login');?>" method="POST" class="form-horizontal">
        <h2 class="text-center">Login</h2>
        <hr>
        <?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('success');?>
          </div>
        <?php }?>
        <?php if ($this->session->flashdata('error')) {?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
          </div>
        <?php }?>
        <div class="form-group">
          <label for="username" class="control-label">Username:</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="password" class="control-label">Password:</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <div class="form-group text-center"> <!-- Added text-center class -->
          <p class="text-center">Don't have an account? <a href="<?php echo base_url('auth/register');?>">Register here</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
