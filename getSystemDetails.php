<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-21 10:20:44
 *获取系统信息api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$response = array(
	'code' => '',
	'success' => '',
	'message' => '',
	'data' => ''
	);

if(isset($userid))
{
	$select_sql = "select * from sy_system";
	$res = mysql_query($select_sql);
	if($res)
	{
		$response['code'] = '200';
		$response['success'] ='true';
		$response['message'] = '请求访问成功';
		while($data = mysql_fetch_assoc($res))
		{
			$response['data'] = $data;
		}
		echo json_encode($response);
	}else
	{
		$response['code'] = '400';
		$response['success'] ='false';
		$response['message'] = '请求访问失败';
	}
}else
{
		$response['code'] = '401';
		$response['success'] ='false';
		$response['message'] = '请登陆后查看';
}