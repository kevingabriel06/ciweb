<?php
if (!isset($_SESSION['id'])) {// !$this->session->userdata('User_ID')
    $this->session->set_flashdata('error', 'Please log in first.');
    redirect(base_url('login'));
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CodeIgniter Project Manager</title>
    <script src="<?php echo base_url('../assets/js/bootstrap.min.js') ?>"></script>
    <link href="<?php echo base_url('../assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">