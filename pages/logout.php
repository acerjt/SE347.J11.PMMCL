<?php 
include('config/dbconfig.php');
unset($_SESSION['username']);
unset($_SESSION['customerid']);
echo "
		<script language='javascript'>	
			window.open('" . $site_url . "?page=login','_self', 1);
		</script>
		";
