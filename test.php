<?php
/*
//连接数据库代码
$mysqli = new mysqli("localhost","root","","php105");
if($mysqli->connect_errno > 0){
	echo "连接错误";
	echo $mysqli->connect_errno;
	exit;
}

$mysqli->query("SET NAMES UTF8");  //解决数据库中乱码问题
*/
session_start();
//var_dump($_SESSION);

include("db.php");

$sql = "SELECT * FROM msg order by id desc";            //select(返回的是对象)增删改（返回的是true/false）
$mysqli_result = $mysqli->query($sql); //$mysqli_result 是一个对象
 
$rows = array();						//这里的$rows是一个二维数组
while($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){
$rows[] = $row;


}
#var_dump($rows);











?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8"/>
		<title>留言板</title>
		<link rel = "stylesheet"href = "style.css"/>
		
	</head>

	<body>
		<div class = "add">
			<form action = "save.php" method = "post" >
				<textarea name = "msg">留言内容</textarea>
				<input class = "user" name = "user" type = "text"/>
				<input class = "btn" type = "submit" value = "发表"/>
				<a class = "btn"href = "login.php">登陆</a>
			
			</form>
		</div>
		
		<div class = "msg">
		
		<?php
			foreach($rows as $row){					//专门用于遍历数组和对象
					$t = date("Y-m-d H:i:s",$row["intime"]);
			
		?>
			<div class = "item">
				<span class = "user"><?php echo $row["username"];?></span>
				<span class = "time"><?php echo $t;?>
				
				<?php
				if(isset($_SESSION['username'])){
				?>
					<a onclick='return confirm("你确定删除吗");' href = "delete.php?id=<?php echo $row['id'];?>">删除</a>
				<?php
				}
				?>
				
				
				
				</span>
				
				<div style ="clear:both";></div>
				<p><?php echo $row["content"];?></p>
			</div>
		<?php
			}
		?>	
			
			
		</div>
	
	
	</body>

</html>