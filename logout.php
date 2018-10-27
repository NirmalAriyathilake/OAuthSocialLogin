<?php
    session_start();
        
    //remove PHPSESSID from browser
    if ( isset( $_COOKIE[session_name()] ) )
    setcookie( session_name(), null, time()-3600, '/' );
    //clear session from globals
    $_SESSION = array();
    //clear session from disk
    session_destroy();
?>

<html>
<body>
<script>
	alert("You are Successfully Logged out!");
    window.location.href = "index.php";
</script>
</body>
</html>