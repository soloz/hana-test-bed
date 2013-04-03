

<h3> You are already logged in as <u><?php echo $this->session->userdata('user_email'); ?> </u></h3>

   <?php  echo "<h5>Not your email address? </h5> "; echo anchor('/logout', '<h5>Logout this User</h5>'); ?>