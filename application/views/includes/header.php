<html>
    <head><title>
            <?php
            if (isset($cityName)) {
                echo $cityName;
                echo "| Tickets for shows in ";
                echo $cityName;
            } elseif (isset($eventName)) {
                echo $eventName;
            } else {
                echo "Ticket Engine: Buy Tickets Online";
            }
            ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>system/libraries/zurbs/stylesheets/foundation.css" media="screen">
	<script type="text/javascript" src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/app.js"></script>


    </head>
    <body>
<div style="float:right;width:210px;margin-top:28px;margin-left:141px; >
 <div id="body_frame">
            <div id="top_links">
                <?php
                echo anchor('main/', 'Home', array('class' => 'decorate'));
                echo "  ";
                echo "  ";
                $is_logged_in = $this->session->userdata('is_logged_in');

                if ($is_logged_in == true) {
                    echo "<br>";
                    echo "You are logged in as: ";
                    echo $this->session->userdata('email');
                    echo "<br>";
                    echo anchor('/profile', 'My Profile', array('class' => 'decorate'));
                    echo " ";
                    echo anchor('/logout', 'Logout', array('class' => 'decorate'));
                    echo "  ";
                } else {
                    echo anchor('/login', 'Member Login', array('class' => 'decorate'));
                    echo "  ";
                    echo "  ";
                    echo anchor('/signup', 'Sign Up', array('class' => 'decorate'));
                }
                echo "  ";
                echo anchor('/cart', 'Cart', array('class' => 'decorate'));
                ?>
            </div>
</div>
            <br><br>

<div id="city_links" style="float:right;width:200px;margin-top:40px;margin-left:10px;>

<?php
foreach ($city as $value) {
    echo anchor('main/city/' . $value['CITY_ID'], $value['CITY_NAME']);
    echo " ";
}
?>
            </div>

            <br><br>


