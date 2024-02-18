<?php
header("Content-type: text/html; charset=utf-8");
include("../cfg/config.php"); //包含文件
if($uid<=0){
	mysqli_close($db);
    exit;
}
$gid=(int)$_REQUEST["gid"];
$zf=(int)$_REQUEST["zf"];//支付方式
$sl=(int)$_REQUEST["sl"];
$msg='';
$boxd=getblindbox($db,$gid);
$box=runsqld($db,"select * from hm_blindbox_detail where blindbox_id='$gid' order by id asc");//盲盒里的商品
$zuida=runsql($db,"select lottery_max_no from hm_blindbox_detail where blindbox_id='$gid' order by id desc limit 1");//随机最大
$od=runsql($db,"select count(id) from hm_order where blindbox_id='$gid' and user_id='$uid' order by id asc");//已买次数
$bl=runsql($db,"select value from hm_sys_setting where id='74' order by id asc");//系统比率，兑换比例

if($boxd['wanfa']==1){
	if($boxd['cs']>$od[0]){
		$sl=3;
		$hj=2*$boxd['price']+0.01;
		if($user['balance']>=$hj && $hj>0){
			//开始购买流程
			$order_no='B'.date("YmdHis").rand(100000,999999);
			$pay_order_no='B'.date("YmdHis").rand(100000,999999);
			$pay_time=date('Y-m-d H:i:s');
			$create_time=$pay_time;//创建时间
			$update_time=$pay_time;
			
			$sql="INSERT INTO hm_order (type,order_no,pay_order_no,user_id,user_name,blindbox_id,play_id,total_num,unit_price,order_price,pay_way,pay_price,pay_status,pay_time,create_time,update_time) VALUES ('2','$order_no','$pay_order_no','$uid','$user[nickname]','$gid','$boxd[wanfa]','$sl','$boxd[price]','$hj','$zf',$hj,'2','$pay_time','$create_time','$update_time')";//创建订单
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			$sql= "update hm_user set balance=balance-'$hj' where id='$uid'";//减掉余额
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			$order_id=runsql($db,"select id from hm_order where order_no='$order_no' and user_id='$uid' order by id asc");//获取订单ID
			
			$sql="INSERT INTO hm_user_balance_change_log (user_id,username,balance,type,order_id,create_time) VALUES ('$uid','$user[nickname]','-$hj','1','$order_id[0]','$create_time')";//增加余额记录
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			$sql="INSERT INTO hm_order_record (order_id,blindbox_id,user_id,username,award_num,create_time,update_time) VALUES ('$order_id[0]','$gid','$uid','$user[nickname]','$sl','$create_time','$update_time')";//增加中奖表
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			$order_record_id=runsql($db,"select id from hm_order_record where order_id='$order_id[0]' and user_id='$uid' order by id asc");//获取中奖表ID
			
			$order_time=times().'000';//当前毫秒级时间戳			
			$syhj=0;
			$hxbhj=0;
			$total_amount=0;
			$cost_price=0;
			for($i=0;$i<$sl;$i++){
				$ss=rand(0,$zuida[0]);
				for($j=0;$j<count($box);$j++){
					if($box[$j]['lottery_min_no']<=$ss && $box[$j]['lottery_max_no']>=$ss){
						//echo $box[$j]['goods_id'].'   ';
						$god=getgoods_id($db,$box[$j]['goods_id']);
						if($i==0){
							$sy=$god['cost_price']-0.01;
						}else{
							$sy=$god['cost_price']-$boxd['price'];
						}
						$range=$box[$j]['lottery_min_no'].','.$box[$j]['lottery_max_no'];
						$tag_id=$box[$j]['tag_id'];
						$sql="INSERT INTO hm_order_record_detail (order_record_id,order_id,user_id,user_name,hash_key,order_time,hash_no,tag_id,goods_id,goods_image,goods_name,unit_price,goods_price,recovery_price,profit,ratio,status,`range`,create_time,update_time) VALUES ('$order_record_id[0]','$order_id[0]','$uid','$user[nickname]','$user[hash_key]','$order_time','$ss','$tag_id','$god[id]','$god[image]','$god[name]','$boxd[price]','$god[price]','$god[recovery_price]','$sy','$bl[0]','1','$range','$create_time','$update_time')";//增加中奖物品表
						//echo $sql;
						mysqli_query($db,$sql) or die(mysqli_error($db));

						$hxbhj+=$god['recovery_price'];//商品的哈希币合计
						$total_amount+=$boxd['price'];//盲盒的价格合计
						$cost_price+=$god['cost_price'];//得到商品的成本价合计
					}
				}
			}
			$syhj=$cost_price-$hj;
			$sql= "update hm_order_record set total_amount='$total_amount',total_exchange_integral='$hxbhj',total_profit='$syhj' where id='$order_record_id[0]'";//更新中奖表
			mysqli_query($db,$sql) or die(mysqli_error($db));
			
			$json=array('code'=>1,'od'=>$order_id[0],'msg'=>'盲盒成功');
			echo json_encode($json);
		}else{
			echo '余额不足';
		}
	}else{
		$json=array('code'=>0,'od'=>0,'msg'=>'您不可以再次购买');
		echo json_encode($json);
	}
}
if($boxd['wanfa']==2){
	if($boxd['cs']>$od[0]){
		//开始购买流程
		
		
		
		
		
	}else{
		$json=array('code'=>0,'od'=>0,'msg'=>'您不可以再次购买');
		echo json_encode($json);
	}
}
if($boxd['wanfa']==3){
	if($boxd['cs']>$od[0]){
		//开始购买流程
		
		
	}else{
		echo '您不可以再次购买';
	}
}
if($boxd['wanfa']==0){//玩法0普通盒子
		//开始购买流程
		//$sl=3;
		if($sl<=0){
			$json=array('code'=>0,'od'=>0,'msg'=>'数量错误');
			echo json_encode($json);
		}else{
			$hj=$sl*$boxd['price'];
			if($user['balance']>=$hj && $hj>0){
				//开始购买流程
				$pid='0';//'父订单id',
				$type='2';//'订单类型 1:普通订单 2:盲盒订单',
				$order_no='B'.date("YmdHis").rand(100000,999999);//'订单号',
				$pay_order_no='B'.date("YmdHis").rand(100000,999999);//'支付订单号',
				$user_id=$uid;//'下单用户',
				$user_name=$user['nickname'];//'下单人名',
				$blindbox_id=$gid;//'购买盲盒的id',
				$box_id='1';//'购买的盲盒的箱子id（预留）',
				$play_id=$boxd['wanfa'];//'盲盒玩法id',
				$total_num=$sl;//'订单商品数量',
				$unit_price=$boxd['price'];//'单抽价格',
				$postage='0.00';//'邮费',
				$order_price=$hj;//'订单总金额',
				$pay_way=$zf;//'支付方式 1:微信 2:支付宝 3:哈希币 4:余额',
				$pay_price=$hj;//'实际支付金额',
				$pay_integral='0';//'实际支付哈希币',
				$pay_postage='0';//'实际支付邮费',
				$coupon_amount='0';//'优惠券累计抵扣金额',
				$pay_status='2';//'支付状态 1:待支付 2:已支付 3:已退款 4:部分退款 5:部分支付 6:支付异常 7:支付超时',
				$pay_time=date('Y-m-d H:i:s');//'支付时间',
				$delivery_time='';//'发货时间',
				$address_id='';//'发货地址id',
				$address_info='';//'发货地址详情',
				$express_name='';//'发货物流名',
				$express_code='';//'物流编号',
				$express_no='';//'发货订单号',
				$cancel_time='';//'取消时间',
				$received_time='';//'收货时间',
				$close_time='';//'关闭时间',
				$status='';//'订单状态 1:待支付 2:待发货 3:待收货 4:部分发货 5:已完成 6:已取消 7:已关闭 8:库存不足',
				$return_msg='';//'第三方返回信息',
				$third_code='';//'第三方支付订单号',
				$remark='';//'用户备注',
				$integral_ratio=$bl[0];//'哈希币兑换比',
				$del_flag='1';//'1:正常 2:删除',
				$user_del='1';//'用户是否删除 1:正常 2:删除',
				$create_time=$pay_time;//'创建时间',
				$update_time=$pay_time;//'更新时间',

				$sql="INSERT INTO hm_order  (pid,`type`,order_no,pay_order_no,user_id,user_name,blindbox_id,box_id,play_id,total_num,unit_price,postage,order_price,pay_way,pay_price,pay_integral,pay_postage,coupon_amount,pay_status,pay_time,create_time,update_time) VALUES ('$pid','$type','$order_no','$pay_order_no','$user_id','$user_name','$blindbox_id','$box_id','$play_id','$total_num','$unit_price','$postage','$order_price','$pay_way','$pay_price','$pay_integral','$pay_postage','$coupon_amount','$pay_status','$pay_time','$create_time','$update_time')";
				//echo $sql;
				mysqli_query($db,$sql) or die(mysqli_error($db));
				
				$sql= "update hm_user set balance=balance-'$hj' where id='$uid'";//减掉余额
				mysqli_query($db,$sql) or die(mysqli_error($db));
				
				$order_id=runsql($db,"select id from hm_order where order_no='$order_no' and user_id='$uid' order by id asc");//获取订单ID
				
				$sql="INSERT INTO hm_user_balance_change_log (user_id,username,balance,type,order_id,create_time) VALUES ('$uid','$user[nickname]','-$hj','1','$order_id[0]','$create_time')";//增加余额记录
				mysqli_query($db,$sql) or die(mysqli_error($db));
				
				$sql="INSERT INTO hm_order_record (order_id,blindbox_id,user_id,username,award_num,create_time,update_time) VALUES ('$order_id[0]','$gid','$uid','$user[nickname]','$sl','$create_time','$update_time')";//增加中奖表
				mysqli_query($db,$sql) or die(mysqli_error($db));
				
				$order_record_id=runsql($db,"select id from hm_order_record where order_id='$order_id[0]' and user_id='$uid' order by id asc");//获取中奖表ID
				
				$order_time=times().'000';//当前毫秒级时间戳			
				$syhj=0;
				$hxbhj=0;
				$total_amount=0;
				$cost_price=0;
				for($i=0;$i<$sl;$i++){
					$ss=rand(0,$zuida[0]);
					for($j=0;$j<count($box);$j++){
						if($box[$j]['lottery_min_no']<=$ss && $box[$j]['lottery_max_no']>=$ss){
							//echo $box[$j]['goods_id'].'   ';
							$god=getgoods_id($db,$box[$j]['goods_id']);
							if($i==0){
								$sy=$god['cost_price']-0.01;
							}else{
								$sy=$god['cost_price']-$boxd['price'];
							}
							$range=$box[$j]['lottery_min_no'].','.$box[$j]['lottery_max_no'];
							$tag_id=$box[$j]['tag_id'];
							$sql="INSERT INTO hm_order_record_detail (order_record_id,order_id,user_id,user_name,hash_key,order_time,hash_no,tag_id,goods_id,goods_image,goods_name,unit_price,goods_price,recovery_price,profit,ratio,status,`range`,create_time,update_time) VALUES ('$order_record_id[0]','$order_id[0]','$uid','$user[nickname]','$user[hash_key]','$order_time','$ss','$tag_id','$god[id]','$god[image]','$god[name]','$boxd[price]','$god[price]','$god[recovery_price]','$sy','$bl[0]','1','$range','$create_time','$update_time')";//增加中奖物品表
							//echo $sql;
							mysqli_query($db,$sql) or die(mysqli_error($db));

							$hxbhj+=$god['recovery_price'];//商品的哈希币合计
							$total_amount+=$boxd['price'];//盲盒的价格合计
							$cost_price+=$god['cost_price'];//得到商品的成本价合计
						}
					}
				}
				$syhj=$cost_price-$hj;
				$sql= "update hm_order_record set total_amount='$total_amount',total_exchange_integral='$hxbhj',total_profit='$syhj' where id='$order_record_id[0]'";//更新中奖表
				mysqli_query($db,$sql) or die(mysqli_error($db));
				
				$json=array('code'=>1,'od'=>$order_id[0],'msg'=>'盲盒成功');
				echo json_encode($json);
			}else{
				$json=array('code'=>0,'od'=>0,'msg'=>'余额不足');
				echo json_encode($json);
			}
		}
}

mysqli_close($db);
exit;

?>

