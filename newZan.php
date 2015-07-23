<?php
/**
 * 
 * @authors 叶伟标
 * @date    2015-07-23 09:32:33
 * 点赞api
 */

include_once 'connectDb.php';

$userid = $_GET['userid'];
$titleid = $_GET['titleid'];
$zan = 'zan';
$id = 'userid';
$tid = 'titleid';
$response = array(
		'code' => '',
		'success' => '',
		'message' => ''
	);
if(isset($userid))
{
	if(isset($titleid))
	{
		$select_user_table = "select $zan from sy_user where $id='$userid'";
		$select_titles_table = "select $zan from sy_titles where $tid='$titleid'";
		$Tab_user = mysql_query($select_user_table);
		$Tab_titles = mysql_query($select_titles_table);
		if($Tab_user && $Tab_titles)
		{
			$row_user = mysql_fetch_assoc($Tab_user);
			$row_titles = mysql_fetch_assoc($Tab_titles);
			if($row_user['zan']!=null && $row_titles['zan']!=null)
			{
				$collections = $row_user['zan'].','.$titleid;
				$collections = $row_titles['zan'].','.$titleid;
			}else
			{
				$collections = $titleid;
			}
			$update_user = "update sy_user set $zan='$collections' where $id = '$userid'";
			$Tab_update_user = mysql_query($update_user);
			$update_titles = "update sy_titles set $zan='$collections' where $tid = '$titleid'";
			$Tab_update_titles = mysql_query($update_titles);
			if($Tab_update_user&&$Tab_update_titles)
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