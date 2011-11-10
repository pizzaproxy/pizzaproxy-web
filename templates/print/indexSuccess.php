<div class="smallcolumn">
<div class="box">
<h1>Bestellzettel</h1>
<table>
    <tr>
      <th>Name</th>
      <th> </th>
      <th> </th>
    </tr>
    <?php foreach ($zettel as $filename):?>
    <tr>
      <td style="vertical-align: top;"><?php echo '<a href="data/zettel/'.$filename.'">'.$filename.'</a>'?></td>
      <td>
      <form method="post" action="index.php" sbtyle="display: inline;">
        <input type="hidden" name="filename" value="<?php echo "data/zettel/$filename"; ?>">
        <input type="hidden" name="action" value="printfile">
        <input type="hidden" name="type" value="zettel">
        <input type="submit" name="delete" value="Print" onclick="return confirm('Nochmal drucken?')" title="Nochmal drucken">
      </form>
      </td>
      <td>
      <form method="post" action="index.php" style="display: inline;">
        <input type="hidden" name="id" value="<?php echo $filename ?>">
        <input type="hidden" name="action" value="mailorder">
        <input type="submit" name="delete" value="@" onclick="return confirm('Bestellung mailen?')" title="Bestellung mailen">
      </form>
    </td>
    </tr>
    <?php endforeach;?>
</table>
</div>
</div>
<div class="smallcolumn">
<div class="box">
<h1>Bons</h1>
<table>
    <tr>
      <th>Name</th>
      <th> </th>
      <th> </th>
    </tr>
    <?php foreach ($bon as $filename):?>
    <tr>
      <td style="vertical-align: top;"><?php echo '<a href="data/bon/'.$filename.'">'.$filename.'</a>'?></td>
      <td>
      <form method="post" action="index.php" style="display: inline;">
        <input type="hidden" name="filename" value="<?php echo "data/bon/$filename"; ?>">
        <input type="hidden" name="action" value="printfile">
        <input type="hidden" name="type" value="bon">
        <input type="submit" name="delete" value="Print" onclick="return confirm('Nochmal drucken?')" title="Nochmal drucken">
      </form>
      </td>
    </tr>
    <?php endforeach;?>
</table>
</div>
</div>

