<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-20 14:12:31
 * 获取分享api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$id = 'userid';
$shared = 'shared';
$response = array(
		'code' => '',
		'success' => '',
		'message' => '',
		'data' => ''
	);
if(isset($userid))
{
	$select_sql = "select $shared from sy_user where $id = '$userid'";
	$res = mysql_query($select_sql);
	if($res)
	{
		$response['code'] = '200';
		$response['success'] = 'true';
		$response['message'] = '请求访问成功';
		while($data = mysql_fetch_assoc($res))
		{
			$getshared = explode(',',$data['shared']);
			$response['data'] = $getshared;
		}
		echo json_encode($response);
	}else
	{
		$response['code'] = '400';
		$response['success'] = 'false';
		$response['message'] = '请求访问失败';
		echo json_encode($response);
	}
}else
{
		$response['code'] = '404';
		$response['success'] = 'false';
		$response['message'] = '请求访问失败';
		echo json_encode($response);
}