<?php
  require('top.php');
  // require('connection_inc.php');
  // require('function_inc.php');
    $categories_id="";
    $name="";
    $mrp="";
    $price="";
    $qty="";
    $image="";
    $short_desc="";
    $description="";
    $meta_title="";
    $meta_desc="";
    $meta_keyword="";
    $msg='';
    $img_required="required";
    if(isset($_GET['id']) && $_GET['id']!=''){
      $img_required=" ";
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"select * from product where id='$id'");
      $check=mysqli_num_rows($res);
      if($check>0){
        $row=mysqli_fetch_assoc($res);
        $categories_id=$row['categories_id'];
        $name=$row['name'];
        $mrp=$row['mrp'];
        $price=$row['price'];
        $qty=$row['qty'];
        $short_desc=$row['short_desc'];
        $description=$row['description'];
        $meta_title=$row['meta_title'];
        $meta_desc=$row['meta_desc'];
        $meta_keyword=$row['meta_keyword'];
      }else{
        header('location:product.php');
        die();
      }
  }

  if(isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

  	$res=mysqli_query($con,"select * from product where name='$name'");
  	$check=mysqli_num_rows($res);
  	if($check>0){
  		if(isset($_GET['id']) && $_GET['id']!=''){
  			$getData=mysqli_fetch_assoc($res);
  			if($id==$getData['id']){
        
  			}else{
  				$msg="product already exist";
  			}
  		}else{
  			$msg="Product already exist";
  		}
    }
    
    if(count($_FILES['image']['name'])>8){
      $msg="Please select maximum 5 images";
    }

    foreach($_FILES['image']['name'] as $key=>$val){
      if($_FILES['image']['type'][$key]=='' || $_FILES['image']['type'][$key]=='image/jpeg' || $_FILES['image']['type'][$key]=='image/jpg' || $_FILES['image']['type'][$key]=='image/png'){
  
      }else{
        $msg="Please select only png,jpg and jpeg image formate";
      }
    }

    


  	if($msg==''){
  		if(isset($_GET['id']) && $_GET['id']!=''){

        if($_FILES['image']['name'][0]!=''){
           foreach($_FILES['image']['name'] as $key=>$val){
               $image=rand(11111111,99999999).'_'.$val;
                 move_uploaded_file($_FILES['image']['tmp_name'][$key],PRODUCT_IMAGE_SERVER_PATH.$image);
                $imageArr[]=$image;
              }
              $imageStr=implode(",",$imageArr);
             
  			  $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc', meta_keyword='$meta_keyword',image='$imageStr' where id='$id'";
        }else{
          $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc', meta_keyword='$meta_keyword' where id='$id'";
        }
        mysqli_query($con,$update_sql);
        
  		}else{
        foreach($_FILES['image']['name'] as $key=>$val){
          $image=rand(11111111,99999999).'_'.$val;
          move_uploaded_file($_FILES['image']['tmp_name'][$key],PRODUCT_IMAGE_SERVER_PATH.$image);
          $imageArr[]=$image;
        }
        $imageStr=implode(",",$imageArr);

  			mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1','$imageStr')");
  		}
  		header('location:product.php');
      die();
    
  	}
  }
?>
    <div class="content">
        <div class="content-header">
            <div class="subheader">
                <h2>PRODUCT FORM</h2>
            </div>
            <form method="post" action="" enctype=multipart/form-data>
                    <label for="">Category Name</label><br>
                    <select id="" name="categories_id">
                        <option >Select Category...</option>
                        <?php
                          $sql=mysqli_query($con,"select id ,categories from categories order by categories asc");
                          while($row=mysqli_fetch_assoc($sql)){
                           if($row['id']==$categories_id){
                              echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                           }else{
                              echo "<option value=".$row['id'].">".$row['categories']."</option>";
                           }
                          }
                        ?>
                    </select><br>
                    <label for="name">Product Name</label><br>
                    <input type="text" value="<?php echo $name;?>" name="name" id="name" placeholder="Enter Product Name*" required><br>
                    
                    <label for="mrp">MRP</label><br>
                    <input type="NUMBER" name="mrp" value="<?php echo $mrp;?>" id="mrp" placeholder="Enter MRP*" required><br>
                    
                    <label for="price">Price</label><br>
                    <input type="NUMBER" name="price" value="<?php echo $price;?>" id="price" placeholder="Enter Price*" required><br>
                    
                    <label for="qty">Quantity</label><br>
                    <input type="NUMBER" name="qty" value="<?php echo $qty;?>" id="qty" required><br>
                    
                    <label for="image">Image</label><br>
                    <input type="file" name="image[]" multiple id="image" <?php echo $img_required?> ><br>
                    
                    <label for="sd">Short Description</label><br>
                    <textarea name="short_desc" id="sd" cols="30" rows="1" placeholder="Enter Product Short Description" require><?php echo $short_desc;?></textarea><br>
                    
                    <label for="d">Description</label><br>
                    <textarea name="description"  id="d" cols="30" rows="2" placeholder="Enter Product Description" require><?php echo $description;?></textarea><br>
                    
                    <label for="mt">Meta Title</label><br>
                    <textarea name="meta_title" id="mt" cols="30" rows="2" placeholder="Enter meta title" require><?php echo $meta_title;?></textarea><br>

                    <label for="md">Meta Description</label><br>
                    <textarea name="meta_desc"  id="md" cols="30" rows="2" placeholder="Enter Meta Description" require><?php echo $meta_desc;?></textarea><br>

                    <label for="mk">Meta Keyword</label><br>
                    <textarea name="meta_keyword"  id="mk" cols="30" rows="2" placeholder="Enter Meta Keyword" require><?php echo $meta_keyword;?></textarea><br>
                    <button type="submit" name="submit">Submit</button>
                    <button type="reset">Reset</button>
                    <div class="msg"><?php echo $msg; ?></div>

            </form>
        </div>
    </div>
 <?php
  include('footer.php');
?>