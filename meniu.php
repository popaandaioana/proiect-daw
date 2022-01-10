<div class="row">
<div class="col-md-2">
<b>Domenii</b><br>

<div class="table-responsive">
<table class="table table-hover">
<?php
$sql = "SELECT * FROM domenii ORDER BY nume_domeniu ASC"; 
$resursa = $db->query($sql);

while($row = $resursa->fetch_object())
{
	print '<tr>';
	print '<td>';
	print '<a href = "domenii.php?id_domeniu='.$row->id_domeniu.'">'.$row->nume_domeniu.'</a>';
	print '</tr>';
	print '</td>';
	
}
?>
</table>
</div>

</div>



