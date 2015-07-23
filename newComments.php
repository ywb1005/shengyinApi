<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-23 11:01:29
 * 评论api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$titleid = $_GET['titleid'];
$parentid = $_GET['parentid'];
$comments = $_GET['comments'];
$id = 'userid';
$tid = 'titleid';
$pid = 'parentid';
$tcom = '$comments';
$response = array(
		'code' => '',
		'success' => '',
		'message' => '',
		'data' => ''
	);
if(isset($userid))
{
	if(isset($titleid))
	{
		if(isset($comments))
		{
			if(isset($parentid))
			{
				$comments_sql = "insert into sy_comments ($id,$tid,$pid,$tcom) values('$userid','$titleid','$parentid','$comments')";
				$res = mysql_query($comments_sql);
				if($res)
				{
					while($data = mysql_fetch_assoc($res))
					{
						$response['data'] = $data['createTime'];
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
				$comments_sql = "insert into sy_comments ($id,$tid,$pid,$tcom) values('$userid','$titleid','$titleid','$comments')";
				$res = mysql_query($comments_sql);
				if($res)
				{
					while($data = mysql_fetch_assoc($res))
					{
						$response['data'] = $data['createTime'];
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
	}else
	{
					$response['code'] = '403';
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