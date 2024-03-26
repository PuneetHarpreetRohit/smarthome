<?php
session_start();

// Unset specific session variable
unset($_SESSION['admin']);

// Destroy all session data
session_destroy();

// Redirect to index.php
echo "<script>window.location='index.php'</script>";
?>
