<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-20 10:57:01
 * connectDb
 */

$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if(!$link)
{
	echo 'Failure to connect'.mysql_error();
}
mysql_query("set names 'utf8'");
mysql_select_db( 'app_getshengyin');