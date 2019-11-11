<?php

session_start();
session_unset();
session_destroy();
echo "
<script>alert ('You are now logout successfully');</script>
<script>window.open('../index.php','_self')</script>
";


?>