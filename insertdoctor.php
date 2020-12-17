<?php
require_once("includes.html");

function newdoctor()
{
  include "DBconnect.php";
  $did=$_POST['did'];
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $experience=$_POST['experience'];
  $specialisation=$_POST['specialisation'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $region=$_POST['region'];
  $sql= "INSERT INTO doctor(DID,name,gender,dob,experience,specialisation,contact,address,username,password,region) VALUES('$did','$name','$gender','$dob','$experience','$specialisation','$contact','$address','$username','$password','$region')";

  if(mysqli_query($conn,$sql))
  {
                    // echo "<h2> DOCTOR ADDED SUCCESSFULLY!!</h2>";
    echo "<script>
    swal({ 
      title: 'Successful!',
      text: 'DOCTOR ADDED SUCCESSFULLY',
      type: 'success' 
      },
      function(){
        window.location.href = 'NewDoctor.php';
        });
        </script>";
                // header("Refresh:3;url=NewDoctor.php");
      }
      else
      {   
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    function checkdid()
    {
     include 'DBconnect.php';
     $did=$_POST['did'];
     $sql= "SELECT * FROM doctor WHERE DID = '$did'";

     $result=mysqli_query($conn,$sql);

     if(mysqli_num_rows($result)!=0)
     {
             // echo"<b><br>DID ALREADY EXISTS!!";
      echo "<script>
      swal({ 
        title: 'DID ALREADY EXISTS!!',
        text: 'Choose an other DID',
        type: 'error' 
        },
        function(){
          window.location.href = 'NewDoctor.php';
          });
          </script>";
        }
        else 
          if(isset($_POST['submit']))
          { 
            newdoctor();
          }
        }
        function checkusername()
        {   
         include 'DBconnect.php';
         $username=$_POST['username'];
         $sql= "SELECT * FROM doctor WHERE username = '$username'";

         $result=mysqli_query($conn,$sql);

         if(mysqli_num_rows($result)!=0)
         {
           // echo"<b><br>Username already exists!!";
          echo "<script>
          swal({ 
            title: 'Username already exists!!',
            text: 'Try with an other username',
            type: 'error' 
            },
            function(){
              window.location.href = 'NewDoctor.php';
              });
              </script>";
            }
            else 
              if(isset($_POST['submit']))
              { 
                checkdid();
              }
            }
            if(isset($_POST['submit']))
            {
              checkusername();
            }
            ?>