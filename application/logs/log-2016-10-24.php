<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-10-24 09:54:49 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `assets`.`name`
FROM `release`
INNER JOIN `assets` ON `release`.`dev_id` = `assets`.`tracker_id`
ORDER BY `id` DESC
 LIMIT 10
