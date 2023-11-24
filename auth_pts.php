<?php
    session_start();
    include('conn.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

       $login = mysqli_query($conn, "SELECT * from tb_petugas WHERE username='$username' and password='$password'");
       $cek = mysqli_num_rows($login);

       if($cek > 0 ){
        $data = mysqli_fetch_assoc($login);

        if($data['id_level']== "1"){
        $_SESSION['id_petugas'] = $id_petugas;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id_level'] = "1";
        header("Location:Admin/index.php");
        
        
        }else if($data['id_level']=="2"){
        $_SESSION['id_petugas'] = $id_petugas;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id_level'] = "2";
        
        header("Location:Petugas/index.php");
    } } else if($username == '' || $password ==''){
        header("Location:login.php?error=min");

    }else{
        header("Location:login.php?error=gagal");
    }
    