<?php
$con = mysqli_connect("localhost", "root", "", "upload_image");
if($con){
    $sql = "select * from images";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result )){
        // echo $row ['id'];
        // echo $row ['path'];
        echo "<img src = '".$row ['path']."' width = '400px'>";

    }
}