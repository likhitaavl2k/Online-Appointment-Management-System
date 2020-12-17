<?php
require_once("includes.html");
$conn=mysqli_connect('localhost','root','','appointment');

if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $dob=$_POST['DOB'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $passwordr=$_POST['pwdr'];
}

$query="SELECT * FROM PATIENT WHERE EMAIL='$email'";
$data=mysqli_query($conn,$query);
$num=mysqli_num_rows($data);

if($num == 1){
    echo "<script>
    swal({ 
        title: 'Email already exist!',
        text: 'Do register using other email ID',
        type: 'error' 
        },
        function(){
            window.location.href = 'signup.php';
            });
            </script>";
        }
        else{
            $sql="INSERT INTO patient(name,gender,dob,phone,username,password,email) VALUES ('$name','$gender','$dob','$contact','$username','$password','$email')";
            $data = mysqli_query($conn,$sql);
            if($data){
                echo "<script>
                swal({ 
                    title: 'Sign Up Successful!',
                    text: 'Welcome!',
                    type: 'success' 
                    },
                    function(){
                        window.location.href = 'Login.php';
                        });
                        </script>";
                    }
                }

// $sql="INSERT INTO patient(name,gender,dob,phone,username,password,email) VALUES ('$name','$gender','$dob','$contact','$username','$password','$email')";
// $sql="INSERT INTO patient(gender,dob,phone,username,password,email) VALUES ($gender','$dob','$contact','$username','$password','$email')";
                ?>