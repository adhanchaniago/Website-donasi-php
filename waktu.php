<?php
	$waktu = date_create();
	$jam = date_format($waktu, "H:i:s");

	echo $jam;
?>