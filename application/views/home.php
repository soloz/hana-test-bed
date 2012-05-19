<h5> <?php echo $cityName; ?> </h5>

<table>
<?php
foreach (array_chunk($tickets, 2) as $ticket) {
 echo "<tr>";
    foreach ($ticket as $twoticket) {
       
        echo "<td>";
        echo anchor('main/event/' . $twoticket['EVENT_ID'], $twoticket['TICKET_NAME']);
        echo "<br>";
        ?>
        <a href ="
        <?php echo base_url();
        echo 'index.php/main/event/' . $twoticket['EVENT_ID'] ?>
           " >
            <img src ="<?php echo base_url();
        echo $twoticket['TICKET_IMAGE_SMALLER']; ?> " border="0">
        </a>
        <?php
        echo "</td>";
    }
    echo "</tr>";
}
?>
</table>       