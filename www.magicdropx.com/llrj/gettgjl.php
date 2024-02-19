<?php
include("../cfg/config.php"); //包含文件
if($uid<=0){
	mysqli_close($db);
    echo "<script>location.href='./login.html';</script>";
    exit;
}
function getzt1($i,$j){
	if($i==$j){
		return'active';
	}
}
$lx=$_REQUEST["lx"];
$id = $_REQUEST["id"];
if($lx=="del" && $id>0){
	$sql= "delete from tgjl where id='$id'";
	mysqli_query($db,$sql) or die(mysqli_error());
}

$xssl=25;//(int)$_REQUEST["xssl"];
$str='';

$sql="select * from tgjl $str order by id desc";

$conn=mysqli_query($db,$sql);
$nums=mysqli_num_rows($conn);//取得总记录数
$pagesize=$xssl;//设定每页的记录数
$pages=ceil($nums/$pagesize);//取得总页数
if($pages<1){$pages=1;}//设定总页数至少1页
$page=$_REQUEST[page];//取得传递过来的页数
if($page>$pages){$page=$pages;}//如果传递过来的页数比总页数还大，就让它等于总页数
if($page<1){$page=1;}//如果传递过来的页数小于1，就让他等于1
$kaishi=($page-1)*$pagesize;//为下一步做准备，limit的初始记录


$sql="select * from tgjl $str order by id desc limit $kaishi,$pagesize";//取得记录从计算出的初始值开始，一共$pagesize条

$res=mysqli_query($db,$sql);//取得结果
$str='';
while($rs=mysqli_fetch_array($res)){
	$str.='<tr role="row" class="odd">
										<td>'.$rs["xname"].'</td>
										<td>'.unixtime_to_date('Y-m-d H:i:s',$rs["time"]).'</td>
										<td>'.$rs["jl"].'</td>
										<td>'.$rs["tz1"].'</td>
										<td>'.$rs["sm"].'</td>
									</tr>';
}

if($pages<=5){
	for($i=1;$i<=$pages;$i++){
		$s1.='<li class="paginate_button '.getzt1($page,$i).'"><a href="javascript:void(0);" onclick="gettgjl('.$i.')">'.$i.'</a></li>';
	}
}else{
	if($page<=3){
		for($i=1;$i<=5;$i++){
			$s1.='<li class="paginate_button '.getzt1($page,$i).'"><a href="javascript:void(0);" onclick="gettgjl('.$i.')">'.$i.'</a></li>';
		}
	}else{
		if($page<=$pages-3){
			for($i=$page-2;$i<=$page+2;$i++){
				$s1.='<li class="paginate_button '.getzt1($page,$i).'"><a href="javascript:void(0);" onclick="gettgjl('.$i.')">'.$i.'</a></li>';
			}
		}else{
			for($i=$pages-4;$i<=$pages;$i++){
				$s1.='<li class="paginate_button '.getzt1($page,$i).'"><a href="javascript:void(0);" onclick="gettgjl('.$i.')">'.$i.'</a></li>';
			}
		}
	}
}


$str='<div style="border-top: 3px solid #00c0ef;border-radius: 3px;background: #ffffff;width: 100%;box-shadow: 0 1px 1px rgb(0 0 0 / 10%);">
						<div style="overflow: auto; position: relative; border: 0px; width: 100%;">
							<div style=" width: 100%; padding-top: 5px;">
								<table style="margin-left: 0px; width: 100%;">
									<tr role="row">
										<th rowspan="1" colspan="1">Account</th>
										<th rowspan="1" colspan="1">Time</th>
										<th rowspan="1" colspan="1">Promotion Reward</th>
										<th rowspan="1" colspan="1">Details</th>
										<th rowspan="1" colspan="1">Description</th>
									</tr>'.$str.'</table>
							</div>
						</div>

						
						

	<div>
		<div style="color: #737373;text-align: center;">Currently showing records'.($kaishi+1).' - '.$pagesize.' ,total '.$nums.' records</div>
	</div>
	<input id="page" name="page" type="hidden" value="'.$page.'">

		<div style="padding-bottom: 5px;">
			<ul class="pagination">
			<li class="paginate_button first" id="example1_first"><a href="javascript:void(0);" onclick="gettgjl(0)">First Page</a></li>
			<li class="paginate_button previous" id="example1_previous"><a href="javascript:void(0);" onclick="gettgjl('.($page-1).')">Previous Page </a></li>
			'.$s1.'
			<li class="paginate_button next" id="example1_next"><a href="javascript:void(0);" onclick="gettgjl('.($page+1).')">Next Page </a></li>
			<li class="paginate_button last" id="example1_last"><a href="javascript:void(0);" onclick="gettgjl('.$pages.')">Last Page </a></li>
			</ul>

		</div>
</div>';
echo $str;
mysqli_close($db);
?>