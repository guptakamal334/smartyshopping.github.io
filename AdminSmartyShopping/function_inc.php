<?php
function pr($arr){
    echo "<pre>";
    print_r($arr);
}

function prx($arr){
    echo "<pre>";
    print_r($arr);
    echo "<pre>";
    die();
}

function get_safe_value($con,$str){
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}
?>
<!-- <button onclick="alertbox()">Try it</button>
<script>
var txt;
   function alertbox(){
            var r = confirm("Do You want delete");
           if(r==true){
            txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
    }
</script>
<?php
   echo "<script>document.write(txt);</script>";
?> -->
