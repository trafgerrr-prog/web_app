<?php
date_default_timezone_set('Europe/Moscow');
function generate_token($id)
{
	$created_at = idate('d') . idate('m') . idate('Y');
	$access_token = $created_at * 5 . "ab" . $id . "cd";
	return $access_token;
}

?>