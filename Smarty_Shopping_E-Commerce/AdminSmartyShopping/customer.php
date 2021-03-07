<?php
  require('top.php');
  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type =='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation =='active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_sql="update users set status='$status' where id ='$id'";
        mysqli_query($con,$update_sql);
    }
    
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from users where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>CUSTOMER</h2>
                <a href="manage-customer.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
            <table>
                <tr>
                    <th>S. No </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th ><div class="action-body">ACTION</div></th>
                </tr>
                <?php 
                if($count>0){
                $i=1;
                while($row=mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['added_on'];?></td>
                    <td ><div class="action-body">
                    <?php
                    if($row['status']==1){
                        echo "<span class='btn active'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>";
                    }else{
                        echo"<span class='btn deactive'><a href='?type=status&operation=active&id=".$row['id']."' >Deactive</a></span>";
                    }  
                        echo "<span class='btn edit'><a href='manage-customer.php?id=".$row['id']."'>Edit</a></span>";
                        echo "<span class='btn delete'><a href='?type=delete&id=".$row['id']."' onclick='alertbox()'>Delete</a></span>";
                     
                        ?></div>
                    </td>
                </tr>
                <?php
                  $i++;   
                  }  } else {
                  ?>
                  <tr>
                     <td colspan="7" align="center">No Records Found!</td>
                  </tr>
                  <?php
                     }   
                  ?>
            </table>
        </div>
    </div>
    <script>
    function alertbox(){
            var r = confirm("Do You want delete");
            if (r == true) {
                
            } else {
                
            }
    }
    </script>
 <?php
  include('footer.php');
?>