<?php session_destroy();
include('../../config/dbconfig.php');

echo "
		<script language='javascript'>	
			window.open('".$site_admin."?page=login','_self', 1);
		</script>
		";