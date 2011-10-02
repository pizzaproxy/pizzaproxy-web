<div class="singlecolumn">
<div class="box">
<h1>Vorbestellungen</h1>
<table>
    <tr>
      <th>Nr.</th>
      <th>Angebot</th>
      <th>Preis</th>
      <th>Status</th>
      <th> </th>
    </tr>
    <?php foreach ($orders as $order):?>
    <tr>
      <td style="vertical-align: top;"><?php echo $order["orderid"]?></td>
      <td>
        <b><?php echo $order["amount"]?> X</b>
        <?php echo $order["pizzaid"]?>
        <?php echo $order["name"]?>
      </td>
      <td>
        <?php echo helper::formatPrice($order["price"])?>
      </td>
      <td style="vertical-align: top;">
        <?php echo $order["status"]?>
      </td>
      <td>
      <form method="post" action="index.php" style="display: inline;">
        <input type="hidden" name="id" value="<?php echo $order["orderid"] ?>">
        <input type="hidden" name="action" value="markaspayed">
        <input type="submit" name="delete" value="Y" onclick="return confirm('Vorbestellung bezahlt?')" title="Vorbestellung bezahlt?">
      </form>
      <form method="post" action="index.php" style="display: inline;">
        <input type="hidden" name="id" value="<?php echo $order["orderid"] ?>">
        <input type="hidden" name="action" value="deletepreorder">
        <input type="submit" name="delete" value="X" onclick="return confirm('Vorbestellung (<?php echo $order["orderid"]?>) löschen?')" title="Vorbestellung löschen">
      </form>
    </td>
    </tr>
    <?php endforeach;?>
</table>
</div>
</div>
