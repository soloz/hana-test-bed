<p id="bigHeader"> Member Login </p>

<div id="flashdata" align="center">
    <?php
    if ($this->session->flashdata('loginError')) {
        echo $this->session->flashdata('loginError');
    }
    echo validation_errors();
    ?>
</div>

<fieldset>
    <legend> Enter login Details </legend>
<?php echo form_open('/validatelogin'); ?>
    <table>
        
        <tr><td>Email:</td><td><?php echo form_input('email', set_value('email', '')); ?></td></tr>
        <tr><td>Password:</td><td><?php echo form_password('password', set_value('', '')); ?></td></tr>
        <tr><td><?php echo form_submit('submit', 'Login'); ?></td><td><?php echo anchor('/signup', 'Create Account'); ?></td></tr>
    <?php echo form_close(); ?>
    </table>
</fieldset> 