<?php
$br = (php_sapi_name() == "cli")? "":"<br>";

if(!extension_loaded('php_keeper')) {
	dl('php_keeper.' . PHP_SHLIB_SUFFIX);
}
$module = 'php_keeper';
$functions = get_extension_funcs($module);
echo "Functions available in the test extension:$br\n";
foreach($functions as $func) {
    echo $func."$br\n";
}
echo "$br\n";
$function = 'confirm_' . $module . '_compiled';
if (extension_loaded($module)) {
	$str = $function($module);
} else {
	$str = "Module $module is not compiled into PHP";
}
echo "$str\n";
?>
