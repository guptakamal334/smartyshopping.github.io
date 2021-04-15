<?php
		include('connection_inc.php');
		include('function_inc.php');
			$id=get_safe_value($con,$_POST['id']);
			
			
			$sql="select * from problem_category where pro_title_id='$id'";
			$res=mysqli_query($con,$sql);
			$html='';
			while($list=mysqli_fetch_assoc($res)){
				$html.='<option value='.$list['id'].'>'.$list['cat_name'].'</option>';
				
			}
			echo $html;
?>