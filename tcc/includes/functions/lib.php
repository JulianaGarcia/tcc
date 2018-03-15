<?php
    function alert($msg){
        echo "<script>alert('$msg');</script>";
    }

    function location($msg){
        echo "<script>window.location = '$msg';</script>";
    }

    function clearCookie(){
        // setcookie( 'siteAuth', serialize( $dados ), time() + 86400 );
        setcookie('siteAuth', '', time() - 3600);
    }
?>