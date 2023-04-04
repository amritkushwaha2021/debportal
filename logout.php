<?php
setcookie('mobile', '', time() - 3600, '/');
setcookie('name', '', time() - 3600, '/');

header('Location: index.php');
exit();
?>
