<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-21 09:54:32
 * 发送意见api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$email = $_GET['email'];
$feeds = $_GET['feeds'];
$user_id = 'userid';
$user_email = 'email';
$user_feeds = 'feeds';
$response = array(
		'code' => '',
		'success' => '',
		'message' => '',
	);
if(isset($userid))
{
	if(isset($email))
	{
		if(isset($feeds))
		{
			$insert_sql = "insert into sy_feedback ($user_id,$user_email,$user_feeds)values('$userid','$email','$feeds')";
			$res = mysql_query($insert_sql);
			if($res)
			{
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
}else
{
				$response['code'] = '403';
				$response['success'] = 'false';
				$response['message'] = '请求访问失败';
				echo json_encode($response);
}