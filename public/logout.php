<?php
session_start();
session_unset();
session_destroy();

header("Location: http://warmi360-refactor-production.up.railway.app/public/?view=login");
exit;
