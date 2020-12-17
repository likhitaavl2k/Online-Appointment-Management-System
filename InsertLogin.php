<?php
    session_start();
    require_once("includes.html");
    $conn=mysqli_connect('localhost','root','','appointment');

    $username=$_POST['username'];
    $email=mysqli_real_escape_string($conn,$username);
    $_SESSION['username'] = $_POST['username'];

    $pass=$_POST['psw'];
    $pass=mysqli_real_escape_string($conn,$pass);

    $query= "SELECT username,password from patient where username='".$username."' and password= '".$pass."'";

    $result=mysqli_query($conn,$query) or die($mysqli_error($conn));

    $num=mysqli_num_rows($result);

    if($num == 0)
    {
        echo "<script>
    swal({ 
        title: 'Invalid Credentials!',
        text: 'Please check and try again',
        type: 'error' 
        },
        function(){
            window.location.href = 'Home.php';
            });
            </script>";   
    }

    else
    {
        $row=mysqli_fetch_array($result);
        $_SESSION['username'] = $row['username'];
        
        echo "<script>
    swal({ 
        title: 'Successful!!',
        text: 'Welcome!',
        type: 'success' 
        },
        function(){
            window.location.href = 'Login.php';
            });
            </script>";   
    }
?>