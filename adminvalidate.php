<?php
require_once("includes.html");
function signin()
{
    session_start();
    {
        if($_POST['uname']=='admin' && $_POST['psw']=='admin')
        { 
            header("Location:AdminPage.php");
        }
        else 
        { 
           echo "<script>
           swal({ 
            title: 'Invalid Credentials!',
            text: 'Please check and try again',
            type: 'error' 
            },
            function(){
                window.location.href = 'adminlogin.php';
                });
                </script>";
            } 
        }
    }
    if(isset($_POST['submit'])) 
    { 
     signin(); 
 }    
 ?>