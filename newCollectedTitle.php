<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-20 14:33:40
 * 收藏api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$titleid = $_GET['titleid'];
$collected = 'collected';
$id = 'userid';
$response = array(
		'code' => '',
		'success' => '',
		'message' => ''
	);
if(isset($userid))
{
	if(isset($titleid))
	{
		$select_sql = "select $collected from sy_user where $id='$userid'";
		$res = mysql_query($select_sql);
		if($res)
		{
			$row = mysql_fetch_assoc($res);
				if($row['collected']!=null)
				{
					$collections = $row['collected'].','.$titleid;
				}else
				{
					$collections = $titleid;
				}
				$update_sql = "update sy_user set $collected='$collections' where $id = '$userid'";
				$update = mysql_query($update_sql);
					if($update)
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
							$response['code'] = '400';
							$response['success'] = 'false';
							$response['message'] = '请求访问失败';
							echo json_encode($response);
		}

	}else
	{
							$response['code'] = '404';
							$response['success'] = 'false';
							$response['message'] = '未找到要分享的文章';
							echo json_encode($response);
	}
}else
{
							$response['code'] = '401';
							$response['success'] = 'false';
							$response['message'] = '请登陆后再收藏';
							echo json_encode($response);
}