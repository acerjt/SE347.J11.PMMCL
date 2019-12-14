<?php
include('../../config/dbconfig.php');
unset($_SESSION['adminusername']);
echo "
		<script language='javascript'>	
			window.open('".$site_admin."?page=login','_self', 1);
		</script>
		";