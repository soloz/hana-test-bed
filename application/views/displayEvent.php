<h3> Event Detail </h3>
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
Event Instances:: Choose a ticket to buy
<hr>
<table border="0" cellpadding="6" cellspacing="0">
<tr> 
	<td width="110">Event Date</td>
	<td width="88">Event Time </td>
	<td width="100">Ticket Type </td>
	<td width="117">Ticket Price </td>
	<td width="140">Venue </td>
	<td width="32">Qty</td>
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
	 
    echo form_open('ticketcart/add'); 
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
       <td> <?php $qty = array('1' => 1,'2' => 2,'3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10);
            echo form_dropdown('qty', $qty, '1'); ?>
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
