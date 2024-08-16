<?php
    try{
        $con = mysqli_connect("127.0.0.1","root","","tubes_web");
    }catch(Exception $e){
        echo "".$e->getMessage();
    }
?>