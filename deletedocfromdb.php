<?php
require_once("includes.html");
        include 'DBconnect.php';
        if(isset($_POST['submit1']))
        {
         $did=$_POST['did'];
         $sql = "DELETE FROM doctor WHERE DID= $did ";
         $sqlda = "DELETE FROM doctor_available WHERE DID= $did ";
         if (mysqli_query($conn, $sql))
         {
                      // echo "Record deleted successfully!!";
          echo "<script>
          swal({ 
            title: 'Record deleted successfully!!',
            text: '',
            type: 'success' 
            },
            function(){
              window.location.href = 'deletedoctor.php';
              });
              </script>";
                            // header( "Refresh:3; url=deletedoctor.php");
            }
            else
            {
             echo "Error deleting record: " . mysqli_error($conn); }
             if (mysqli_query($conn, $sqlda))
             {
              echo "<script>
              swal({ 
                title: 'Record deleted successfully!!',
                text: '',
                type: 'success' 
                },
                function(){
                  window.location.href = 'deletedoctor.php';
                  });
                  </script>";
                          // echo "Record deleted successfully!!";
                          // header( "Refresh:3; url=deletedoctor.php");
                }
                else
                {
                 echo "Error deleting record: " . mysqli_error($conn); }
               }       
               if(isset($_POST['submit2']))
               {
                 $did=$_POST['doctorname'];
                 $sql = "DELETE FROM doctor WHERE did = $did ";
                 $sqlda = "DELETE FROM doctor_available WHERE DID= $did ";
                 if (mysqli_query($conn, $sql))
                 {
                          // echo "Record deleted successfully!!";
                          // header( "Refresh:3; url=DeleteDoctor.php");
                  echo "<script>
                  swal({ 
                    title: 'Record deleted successfully!!',
                    text: '',
                    type: 'success' 
                    },
                    function(){
                      window.location.href = 'deletedoctor.php';
                      });
                      </script>";
                    }
                    else
                    {
                     echo "Error deleting record: " . mysqli_error($conn);
                   }
                   if (mysqli_query($conn, $sqlda))
                   {
          // echo "Record deleted successfully!!";
          // header( "Refresh:3; url=DeleteDoctor.php");
                    echo "<script>
                    swal({ 
                      title: 'Record deleted successfully!!',
                      text: '',
                      type: 'success' 
                      },
                      function(){
                        window.location.href = 'deletedoctor.php';
                        });
                        </script>";
                      }
                      else
                      {
                       echo "Error deleting record: " . mysqli_error($conn);
                     }
                   }
                   ?>			