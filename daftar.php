<?php
 include('conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include
  include("assets/PHPMailer-master/src/Exception.php");
  include("assets/PHPMailer-master/src/PHPMailer.php");
  include("assets/PHPMailer-master/src/SMTP.php");

        $nama_lengkap = $_POST['nama_lengkap'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, 'foto-user/'.$foto);



       $mysqli = mysqli_query($conn, "INSERT INTO tb_masyarakat VALUES('','$email','$nama_lengkap','$username','$password','$telp','$foto')");

    if(($mysqli)){
        $email_pengirim = 'ditya7823@gmail.com';
        $nama_pengirim = 'SI_LELANG';
        $email_penerima = $_POST['email'];
        $pesan = 'Selamat akun anda sudah berhasil di tambahkan, username anda : <b> '.$username.' </b> dan password anda : <b>'.$password.'</b> Silahkan untuk mencoba login. ';

        $mail = new PHPMailer;
        $mail->isSMTP();
        
        $mail->SetFrom($email_pengirim, $nama_pengirim);
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'rlguvmguhbwaeazk';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 2 ;

        $mail->addAttachment('/file/bg.jpg', 'new.jpg');    

        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = "Registrasi new user SI LELANG"; 
        $mail->Body = $pesan;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $send = $mail->send();

        if($send){
            echo "<h1>Email berhasil di kirim </h1> <br/> <a href='index.php'>Kembali ke form</a>";
        }else{
            echo "<h1>Email gagal di kirim </h1> <br/> <a href='index.php'>Kembali ke form</a>";
            
        }

        echo "<script>alert('Data berhasil ditambahkan dan email notifikasi terkirim')</script>";
        echo "<script>document.location='index.php';</script>";


    }