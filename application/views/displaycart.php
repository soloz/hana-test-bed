<div class="row">
<div class="nine columns">
	
	
<?php
   echo "<h1>Ticket Cart</h1>";
   echo "<hr>";
   
   if (!$this->cart->contents()) {
    echo "Cart is Empty! "; echo "<br><br>";
	echo anchor ('/main','Please select tickets to buy', array('class' => 'decorate'));
}else {
   
  ?>

	
<table border="0" width="980" cellpadding="8" cellspacing="0">
<tr>
    <td width="182">Event Name</td>
    <td width="122">Event Date</td>
    <td width="91">Event Time</td>
    <td width="110">Ticket Type</td>
      <td width="83">Qty</td>
    <td width="78">Venue</td>
    <td width="68">Price</td>
    <td width="130">Line Total</td>
    <td width="8"></td>
  </tr>

 <?php  $i = count($this->cart->contents());  ?>

        <?php 
        echo form_open('ticketcart/update_cart');
                foreach($this->cart->contents() as $items){ 
                      echo form_hidden('rowid[]', $items['rowid']);    
         ?>
              
  
    <tr <?php if ($i % 2) { echo "bgcolor = '#cccc00'"; }else{ echo "bgcolor = '#ccf00'";  } $i--; ?> >
        <td width="181"><?php echo $items['name']; ?></td>
      <td width="123"><?php echo $items['eventDate']; ?></td>
      <td width="91"><?php echo $items['eventTime']; ?></td>
      <td width="109"><?php echo $items['ticketCategory']; ?></td>
      <td width="83"><?php $qty = array('1' => 1,'2' => 2,'3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10); echo form_dropdown('qty[]', $qty, $items['qty']); ?></td>
      <td width="79"><?php echo $items['cityName']; ?></td>
      <td width="70"><?php echo "N"; echo $this->cart->format_number($items['price']); ?></td>
      <td width="62"><?php echo "N"; echo $this->cart->format_number($items['subtotal']); ?></td>
      <td width="74"><?php echo anchor('ticketcart/remove/'.$items['rowid'], 'Remove'); ?></td>
  </tr>
    
 <?php
        }
  ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Charges: </td>
      <td><?php 
        $c = 0.1 * $this->cart->total();
        echo "N"; echo $this->cart->format_number($c);
        ?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Tickets(<?php echo $this->cart->total_items(); ?>)</td>
        <td><strong>Total:</strong></td>
      <td><strong><?php echo "N"; echo $this->cart->format_number($this->cart->total() + $c); ?></strong></td>
      <td></td>
    </tr>
</table>

<table border="0" width="980" cellpadding="2" cellspacing="0">
<tr>
        <td width="96"><?php echo form_submit('action', 'Update Cart'); ?></td>
    <td width="129"><?php echo anchor('main/', 'Add More Tickets'); ?></td>
    <td width="743"><?php echo anchor('ticketcart/checkout', 'Check Out >>>>'); ?></td>
  </tr>
</table>
<?php echo form_close(); ?>

</div>
</div>
<?php
} 
?>