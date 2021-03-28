<?php
session_start();
$old_sessionid=session_id();

//セッションID発行して前のIDが無効になる
session_regenerate_id();

$new_sessionid=session_id(true);





?>