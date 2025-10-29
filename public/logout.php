<?php
session_start();
session_unset();
session_destroy();

header("Location: http://localhost/Warmi360-Refactor/public/?view=login");
exit;
