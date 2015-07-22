<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-21 11:32:00
 * 获取点赞api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$titleid = $_GET['titleid'];
$gettitleid = 'titleid';
$getzan = 'zan';
$response = array(
	'code' => '',
	'success' => '',
	'message' => '',
	'data' => ''
	);

if(isset($userid))
{
	if(isset($titled))
	{
		$select_sql = "select $getzan from sy_titles where  $gettitleid='$titleid'";
		$res = mysql_query($select_sql);
		while($data = mysql_fetch_assoc($res))
		{
			$response['data'] = $data;
		}
		$response['code'] = '200';
		$response['success'] = 'true';
		$response['message'] = '请求访问成功';
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
		$response['code'] = '401';
		$response['success'] = 'false';
		$response['message'] = '请求访问失败';
		echo json_encode($response);
}