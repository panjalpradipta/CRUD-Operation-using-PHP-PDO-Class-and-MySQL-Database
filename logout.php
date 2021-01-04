<?php

#session start
session_start();

session_destroy();

echo "<script>
alert('You Have succefully logged out');
window.location.href='login.php';
</script>";
?>