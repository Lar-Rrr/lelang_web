<?php
    session_start();
    include('conn.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

       $data = mysqli_query($conn, "SELECT * from tb_masyarakat WHERE username='$username' and password='$password'");
       $cek = mysqli_num_rows($data);

       if($cek > 0 ){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['status'] = "login";

         header("Location:Masyarakat/index.php");
    }else if($username == '' || $password ==''){

        header("Location:index.php?error=min");
    }
    else{
        header("Location:index.php?error=gagal");

       }
    