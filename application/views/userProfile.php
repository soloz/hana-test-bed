<p id="bigHeader"> My Profile</p>

<div align="center">
    <?php echo form_open('/updateProfile'); ?>
    <table>
        <tr>
          <td>&nbsp;</td>
          <td>Personal Information</td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr><td width="133">First Name:</td>
            <td width="164"><?php echo form_input('firstname', set_value('firstname', $user_details['FIRSTNAME'])); ?></td>
            <td width="271"></td>
        </tr>

        <tr><td>Last Name:</td>
            <td><?php echo form_input('lastname', set_value('lastname', $user_details['LASTNAME'])); ?></td>
            <td></td>
        </tr> 

        <tr><td>Username:</td>
            <td><?php echo form_input('username', set_value('username', $user_details['USERNAME'])); ?></td>
            <td></td>
        </tr> 

        <tr><td>Gender:</td>
            <td><?php
    $gender = array('-select-' => '-select-', 'FEMALE' => 'FEMALE', 'MALE' => 'MALE');
    echo form_dropdown('gender', $gender, $user_details['GENDER']);
    ?></td>
            <td></td>
        </tr> 

        <tr><td>Your City:</td>
            <td><?php echo form_input('username', set_value('username', $user_details['CITY'])); ?></td>
            <td></td>
        </tr> 

        <tr><td>Your Birthday:</td>
            <td>
                <?php
                /* $day = array('1' => '1', '2' => '2', '3' => '3'); 
                  $month = array('Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar');
                  $year = array('1980' => '1980', '1981' => '1981', '1982' => '1982');

                  echo form_dropdown('day', '$day', '');
                  echo form_dropdown('month', '$month','');
                  echo form_dropdown('year', '$year','');
                 * 
                 */
                ?>        </td>
            <td></td>
        </tr> 

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height="37">Your Email:</td><td><?php echo $user_details['EMAIL']; ?></td>
            <td><div align="right">change your email address</div></td>
        </tr>


        <tr>
            <td height="40">Password:</td>
          <td>****************</td>
            <td><div align="right">change your password</div></td>
        </tr>
     
        <tr>
            <td height="49"></td>
          <td>Optional Preference</td>
            <td></td>
        </tr>
        
        <tr>
          <td height="48" colspan="3">Recieve our alerts about </td>
        </tr>
        <tr>
          <td height="43"><?php echo form_checkbox('MUSICALS', 'accept', TRUE); ?> MUSICALS</td>
          <td><?php echo form_checkbox('CINEMAS', 'accept', TRUE); ?> CINEMAS</td>
          <td><?php echo form_checkbox('STAGE-PLAY', 'accept', TRUE); ?>STAGE PLAY</td>
        </tr>
        <tr>
          <td height="35"><?php echo form_checkbox('DRAMA', 'accept', TRUE); ?> DRAMA</td>
          <td><?php echo form_checkbox('TALK-SHOW', 'accept', TRUE); ?> TALK SHOW</td>
          <td><?php echo form_checkbox('COMEDY', 'accept', TRUE); ?> COMEDY</td>
      </tr>
        <tr>
          <td></td>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Update Your Profile'); ?></td>
            <td></td>
        </tr>
    </table>
<?php echo form_close(); ?>
</div>