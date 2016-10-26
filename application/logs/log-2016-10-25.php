<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-10-25 07:33:04 --> 404 Page Not Found: Media/css
ERROR - 2016-10-25 08:15:27 --> Severity: Parsing Error --> syntax error, unexpected '$fetch' (T_VARIABLE) C:\xampp\htdocs\epams\application\models\Asset_model.php 106
ERROR - 2016-10-25 08:17:54 --> Severity: Notice --> Undefined property: Asset::$asset_model C:\xampp\htdocs\epams\application\controllers\Asset.php 372
ERROR - 2016-10-25 08:17:54 --> Severity: Error --> Call to a member function select_category() on null C:\xampp\htdocs\epams\application\controllers\Asset.php 372
ERROR - 2016-10-25 08:18:37 --> Severity: Notice --> Undefined property: Asset::$Asset_model C:\xampp\htdocs\epams\application\controllers\Asset.php 372
ERROR - 2016-10-25 08:18:37 --> Severity: Error --> Call to a member function select_category() on null C:\xampp\htdocs\epams\application\controllers\Asset.php 372
ERROR - 2016-10-25 08:27:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LIKE '%%' ESCAPE '!'' at line 3 - Invalid query: SELECT *
FROM `category`
WHERE  LIKE '%%' ESCAPE '!'
ERROR - 2016-10-25 08:33:07 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\epams\system\database\DB_query_builder.php 943
ERROR - 2016-10-25 08:33:31 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\epams\system\database\DB_query_builder.php 943
ERROR - 2016-10-25 08:34:11 --> Query error: Unknown column 'name' in 'where clause' - Invalid query: SELECT *
FROM `category`
WHERE `name` LIKE '%%' ESCAPE '!'
AND  `_` LIKE '%1477377093732%' ESCAPE '!'
ERROR - 2016-10-25 08:34:13 --> Query error: Unknown column 'name' in 'where clause' - Invalid query: SELECT *
FROM `category`
WHERE `name` LIKE '%%' ESCAPE '!'
AND  `_` LIKE '%1477377093733%' ESCAPE '!'
ERROR - 2016-10-25 08:50:55 --> Severity: Notice --> Undefined property: stdClass::$categName C:\xampp\htdocs\epams\application\controllers\Asset.php 62
ERROR - 2016-10-25 08:55:31 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\epams\application\models\Asset_model.php 21
ERROR - 2016-10-25 08:56:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`category_id` USING (`left`)
JOIN `condition con, con`.`id =` `a`.`condition_id' at line 3 - Invalid query: SELECT *
FROM `assets` `a`
JOIN `category cat, cat`.`id =` `a`.`category_id` USING (`left`)
JOIN `condition con, con`.`id =` `a`.`condition_id` USING (`left`)
JOIN `status s, s`.`id =` `a`.`status_id` USING (`left`)
ERROR - 2016-10-25 08:58:39 --> Query error: No tables used - Invalid query: SELECT *
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 09:04:16 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT *
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 09:06:45 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT *
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 09:14:37 --> Query error: Unknown column 'con.* con.id' in 'field list' - Invalid query: SELECT `a`.*, `a`.`id` AS `assets_id`, `cat`.*, `cat`.`id` AS `category_id`, `con`.`* con`.`id` AS `condition_id`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 09:17:13 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `a`.*, `a`.`id` AS `assets_id`, `cat`.*, `cat`.`id` AS `category_id`, `con`.*, `con`.`id` AS `condition_id`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 09:21:08 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `a`.*, `a`.`id`, `cat`.*, `cat`.`id` AS `category_id`, `con`.*, `con`.`id` AS `condition_id`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 09:40:32 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `a`.*, `cat`.`id` as `category_id`, `cat`.`categName`, `con`.`id` as `condition_id`, `con`.`condition`, `s`.`id` as `status_id`, `s`.`status`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
WHERE `id` = '16'
ERROR - 2016-10-25 09:41:10 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `a`.*, `cat`.`id` as `category_id`, `cat`.`categName`, `con`.`id` as `condition_id`, `con`.`condition`, `s`.`id` as `status_id`, `s`.`status`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
WHERE `id` = '16'
ERROR - 2016-10-25 09:42:14 --> DATA ID: 16
ERROR - 2016-10-25 09:42:23 --> DATA ID: 16
ERROR - 2016-10-25 10:22:29 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `assets`.`name`
FROM `release`
INNER JOIN `assets` ON `release`.`dev_id` = `assets`.`tracker_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 10:27:46 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `assets`.`name`
FROM `release`
INNER JOIN `assets` ON `release`.`dev_id` = `assets`.`tracker_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 16:53:42 --> Severity: Notice --> Undefined index: status C:\xampp\htdocs\epams\application\views\content\inventory.php 71
ERROR - 2016-10-25 11:03:35 --> Severity: Notice --> Undefined variable: assets C:\xampp\htdocs\epams\application\controllers\Release.php 53
ERROR - 2016-10-25 11:03:35 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\epams\application\controllers\Release.php 53
ERROR - 2016-10-25 11:04:19 --> Severity: Notice --> Undefined variable: assets C:\xampp\htdocs\epams\application\controllers\Release.php 53
ERROR - 2016-10-25 11:04:19 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\epams\application\controllers\Release.php 53
ERROR - 2016-10-25 11:06:10 --> Severity: Notice --> Undefined variable: assets C:\xampp\htdocs\epams\application\controllers\Release.php 53
ERROR - 2016-10-25 11:06:10 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\epams\application\controllers\Release.php 53
ERROR - 2016-10-25 11:18:47 --> Query error: Column 'category_id' in order clause is ambiguous - Invalid query: SELECT `a`.*, `cat`.`id` as `category_id`, `cat`.`categName`, `con`.`id` as `condition_id`, `con`.`condition`, `s`.`id` as `status_id`, `s`.`status`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `category_id` ASC
 LIMIT 10
ERROR - 2016-10-25 11:27:56 --> 404 Page Not Found: Release/select_employee
ERROR - 2016-10-25 11:30:43 --> Severity: Error --> Call to undefined method Asset_model::select_employee() C:\xampp\htdocs\epams\application\controllers\Release.php 78
ERROR - 2016-10-25 11:30:50 --> Severity: Error --> Call to undefined method Asset_model::select_employee() C:\xampp\htdocs\epams\application\controllers\Release.php 78
ERROR - 2016-10-25 11:32:10 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `a`.`device_id`, `a`.`name`, `a`.`model`, `a`.`resolution`, `a`.`processor`, `a`.`ram`, `a`.`os`, `a`.`gpu`, `a`.`bit`, `a`.`simSupport`, `cat`.`categName`, `con`.`condition`, `s`.`id` as `status_id`, `s`.`status`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 11:34:36 --> Severity: Notice --> Undefined property: stdClass::$id C:\xampp\htdocs\epams\application\controllers\Release.php 55
ERROR - 2016-10-25 11:34:36 --> Severity: Notice --> Undefined property: Release::$asset C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:34:36 --> Severity: Error --> Call to a member function count_all() on null C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:35:00 --> Query error: Column 'id' in order clause is ambiguous - Invalid query: SELECT `a`.`device_id`, `a`.`name`, `a`.`model`, `a`.`resolution`, `a`.`processor`, `a`.`ram`, `a`.`os`, `a`.`gpu`, `a`.`bit`, `a`.`simSupport`, `cat`.`categName`, `con`.`condition`, `s`.`id` as `status_id`, `s`.`status`
FROM `assets` `a`
LEFT JOIN `category` `cat` ON `cat`.`id` = `a`.`category_id`
LEFT JOIN `condition` `con` ON `con`.`id` = `a`.`condition_id`
LEFT JOIN `status` `s` ON `s`.`id` = `a`.`status_id`
ORDER BY `id` DESC
 LIMIT 10
ERROR - 2016-10-25 11:35:38 --> Severity: Notice --> Undefined property: stdClass::$id C:\xampp\htdocs\epams\application\controllers\Release.php 55
ERROR - 2016-10-25 11:35:38 --> Severity: Notice --> Undefined property: Release::$asset C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:35:38 --> Severity: Error --> Call to a member function count_all() on null C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:37:26 --> Severity: Notice --> Undefined property: Release::$asset C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:37:26 --> Severity: Error --> Call to a member function count_all() on null C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:38:04 --> Severity: Notice --> Undefined property: Release::$asset C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:38:04 --> Severity: Error --> Call to a member function count_filtered() on null C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:38:11 --> Severity: Notice --> Undefined property: Release::$asset C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:38:11 --> Severity: Error --> Call to a member function count_filtered() on null C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:39:13 --> Severity: Notice --> Undefined property: Release::$asset C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:39:13 --> Severity: Error --> Call to a member function count_all() on null C:\xampp\htdocs\epams\application\controllers\Release.php 68
ERROR - 2016-10-25 11:39:55 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:39:59 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:40:00 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:40:00 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:40:52 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:41:01 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:41:28 --> 404 Page Not Found: Asset/select_item
ERROR - 2016-10-25 11:41:28 --> 404 Page Not Found: Asset/select_item
