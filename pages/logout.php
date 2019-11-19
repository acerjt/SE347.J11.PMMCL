<?php session_destroy();
include('../../config/dbconfig.php');

echo "
		<script language='javascript'>	
			window.open('" . $site_url . "?page=home','_self', 1);
		</script>
		";
