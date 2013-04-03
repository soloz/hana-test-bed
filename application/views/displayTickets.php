<?php
if ($cityName == "Nationwide") {
    echo "<h5>Tickets $cityName</h5>";
} else {
    echo "<h5>Tickets for shows in " . $cityName;
    echo "</h5>";
}
?>
<br>
<table cellpadding="7" cellspacing="3">
    <?php
    foreach (array_chunk($tickets, 2) as $ticket) {
        echo "<tr>";
        foreach ($ticket as $twoticket) {  ?>

            <td> <?php echo anchor('main/event/' . $twoticket['EVENT_ID'], $twoticket['TICKET_NAME'], array('class' => 'ticketHeader')); ?><br>
                <?php echo anchor('main/event/' . $twoticket['EVENT_ID'], img($twoticket['TICKET_IMAGE_SMALLER'])); ?>
                <div> <br> </div>
                <div></div>
            </td>
            <?php
          }
           echo "</tr>";
       }
    ?>
</table>       