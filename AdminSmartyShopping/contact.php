<?php
  require('top.php');
  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from contact_us where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}
$sql="select * from contact_us order by added_on desc";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>CONTACK</h2>
                
            </div>
            <table>
                <tr>
                    <th>S. No </th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Query</th>
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
                    <td><?php echo $row['comment'];?></td>
                    <td><?php echo $row['added_on'];?></td>
                    <td ><div class="action-body">
                    <?php
                        echo "<span class='btn delete'><a href='?type=delete&id=".$row['id']."' onclick='alertbox()'>Delete</a></span>";
                        ?></div>
                    </td>
                </tr>
                <?php
                  $i++;   
                  }  } else {
                  ?>
                  <tr>
                     <td colspan="4" align="center">No Records Found!</td>
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