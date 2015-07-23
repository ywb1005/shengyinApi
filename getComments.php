<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-23 14:04:59
 * 获取评论api
 */

$userid = $_GET['userid'];
$titileid = $_GET['titleid'];
$parentid = $_GET['parentid'];
$pid = 'parentid';
$tid = 'titleid';
$response = array(
		'code' => '',
		'success' => '',
		'message' =>,
		'data' => ''
	);
if(isset($userid))
{
	if(isset($titleid))
	{
		if(isset($parentid))
		{
			$select_sql = "select * from sy_comments where $pid='$parentid'";
			$res = mysql_fetch_assoc($select_sql);
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
			$select_sql = "select * from sy_comments where $tid='$titleid'";
			$res = mysql_fetch_assoc($select_sql);
			while($data = mysql_fetch_assoc($res))
			{
				$response['data'] = $data;
			}
				$response['code'] = '200';
				$response['success'] = 'true';
				$response['message'] = '请求访问成功';
				echo json_encode($response);
		}
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
