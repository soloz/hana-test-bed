<div class="row">
<div class="nine columns">
	
<p></p>

<h2><?php echo $eventName; ?> </h2>
<?php
foreach ($eventDetails as $event) {
    $eventImage = Ticket::getTicketImage($event['EVENT_ID']);
    $eventCategory = Event::getEventCategory($event['EVENT_CATEGORY_ID']);

         echo img($eventImage);
         echo "<br>";
         echo "<br>";
         echo "Category: ";
         echo $eventCategory;
         echo "<br>";
         echo $event['EVENT_DESCRIPTION'];
         echo "<br>";
         echo "Tickets Available : ";
         echo $event['EVENT_TICKET_IN_STOCK'];
         echo "<br>";
     }
     ?>

<hr>
<h6>Event Instances:: Choose a ticket to buy</h6>
<hr>
<table border="0" cellpadding="6" cellspacing="0">
<tr> 
	<td width="110"><i><h6>Event Date</h6></i></td>
	<td width="88"><i><h6>Event Time</h6></i> </td>
	<td width="100"><i><h6>Ticket Type</h6></i> </td>
	<td width="117"><i><h6>Ticket Price</h6></i> </td>
	<td width="140"><i><h6>Venue</h6></i> </td>
	<td width="32"><i><h6>Qty</h6></i></td>
    <td width="122"> </td>

</tr>
<?php
$i = count($eventInstances);
foreach ($eventInstances as $Instances) { 
      
    $instancePrice = Event::getEventInstancePrice($Instances['TICKET_PRICE_ID']);
    $buildingName = Location::getBuildingName($Instances['LOCATION_INSTANCE_ID']);
    $cityName = City::getCityName($Instances['CITY_ID']);
    $ticketName = Ticket::getTicketName($Instances['TICKET_ID']);
    $ticketCategory = Ticket::getTicketCategory($Instances['TICKET_PRICE_ID']);
	$attr=array('name'=>'qty','class' => 'nice custom', 'id'=>'qty') ; 
	
    echo form_open('ticketcart/add', $attr); 
    echo form_hidden('instanceID', $Instances['EVENT_INSTANCE_ID']);
    echo form_hidden('price', $instancePrice);
    echo form_hidden('name', $ticketName);
    
    echo form_hidden('ticketCategory', $ticketCategory);
    echo form_hidden('ticketID', $Instances['TICKET_ID']);
    echo form_hidden('buildingName', $buildingName);
    echo form_hidden('cityName', $cityName);
    
    echo form_hidden('eventID', $Instances['EVENT_ID']);
    echo form_hidden('eventTime', $Instances['EVENT_TIME']);
    echo form_hidden('eventDate', $Instances['EVENT_DATE']);
    ?>
     <tr <?php if ($i % 2) { echo "bgcolor = '#f4f4f4'"; }else{ echo "bgcolor = '#fff'"; } $i--; ?> >
        <td> <?php echo $Instances['EVENT_DATE']; ?> </td>
	<td> <?php echo $Instances['EVENT_TIME']; ?> </td>
        <td><?php echo $ticketCategory; ?> </td>
	<td> <?php echo "N"; echo $this->cart->format_number($instancePrice); ?> </td>
	<td> <?php echo anchor_popup('main/eventVenue/'. $Instances['LOCATION_INSTANCE_ID'], $buildingName , array()); ?> </td>
       <td> <div class="custom dropdown"> <?php $qty = array('1' => 1,'2' => 2,'3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10); 
            echo form_dropdown('qty', $qty, '1'); ?>
			</div>
 </td>
        <td> <?php 
        
        $is_logged_in = $this->session->userdata('is_logged_in');
                if($is_logged_in == true) {
                echo form_submit('action', 'Add to Cart');
                }else{
                 echo anchor('/login', 'Login to purchase'); 
                }
        
        
         ?></td>
        </tr>
 <?php
  echo form_close();
}
?>

</table>

</div>

<div class="three columns">
	<div class="panel hide-on-phones">

		<div class="row">
                        <div class="twelve columns">
<a href="#" id="MemberRegister" class="nice small radius button" data-reveal-id="registration"> Become a Member</a>
                        </div>
		 </div>
                 <div class="row">
		           <div class="twelve columns">
                                <p><b><h5>MEMBERSHIP IS FREE</h5></b>Discounts available on bulk purchase....<br /><a href="#">Read More &rarr;</a></p>
                        </div>
		     </div>
                
		<div class="row">
			<div class="twelve columns">
				<p>Stay in touch by following us on Twitter</p>
				<p class="left follow" style="width: 125px; overflow: hidden;">
<a href="http://twitter.com/ticke" class="twitter-follow-button" data-show-count="false">Follow @ticke</a>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></p>
			</div>
		
		</div>
		
			<div class="row">
				<div class="twelve columns">
					
					<div style="margin: 2px 0px;" style="float:left;">
					<p style="line-height: 18px; color: rgb(51, 51, 51); font-size: 14px;">Already a member? <a style="font-size: 12px;font-weight:bold;" href="#" class="sign-in-log">Sign In</a></p>
					<div id="signupbox_beta" style="margin:20px 0px">
						
						<form id="signthree" action="">
						<div  >
							<span style="display: block;  padding: 3px 0px;color:#999;font-size:12px;">Email address </span><input type="text"  id="email_news_beta" name="email_news_beta" maxlength="60" placeholder="Email" class="input-text" style="float: left; width: 160px;border:1px solid 333;background-color: #ffffcd;">
							<input type="hidden" value="" id="referrer_beta" name="referrer_beta">
							<div id="errorEmail_beta" class="clear cred leftblock" style="width: 200px; height: 15px;">&nbsp;</div>
						</div>
						<div class="clear" style="margin-top: 3px;">
						<span style="display: block;padding: 3px 0px;color:#999;font-size:12px;">Password  &nbsp;<a href="<?php echo base_url(); echo 'index.php/main/passwdreset/';?>" class="cred" style="font-size: 11px;">forgot password?</a></span><input type="password" placeholder="Password" class="input-text" value="" id="post_news_beta" name="post_news_beta" maxlength="32" style="float: left; width: 160px;border:1px solid 333;background-color: #ffffcd;">
						<div id="errorPost_beta" class="cred" style="height: 15px; width: 200px;">&nbsp;</div>
						</div>
						
						<div class="clear">
						<input type="submit" value="Login" id="submit_email_beta" style="margin: 10px 0px;float:left;">
						</div>
						
					  </form>
					
					</div>
		
						</div>
						
						</div>
			</div>
			</div>
</div>
</div>
