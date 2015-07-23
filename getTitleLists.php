<?php
/**
 * 
 * @authors 叶伟标 
 * @date    2015-07-20 09:50:41
 * @version 获取文章列表api 
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$location = $_GET['location'];
$page = ($location-1)*10;
$response  = array(
		'code' => '',
		'success' => '',
		'message' => '',
		'data' => ''
	);
if(isset($userid))
{
	if(iseet($location))
	{
		$select_sql = "select * from sy_titles limit $page,10";
		$res = mysql_query($select_sql);
		if($res)
		{
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
}else
{
			$response['code'] = '402';
			$response['success'] = 'false';
			$response['message'] = '请求访问失败';
		    echo json_encode($response);
}