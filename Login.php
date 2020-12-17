<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <style >
            .btn{
    font-size: 17px;
    color: #fff;
    background: #ff0157;
    display: inline-block;
    padding: 10px 30px;
    margin-top: 20px;
    /*text-transform: uppercase;*/
    text-decoration: none;
    letter-spacing: 1px;
    transition: 0.5s;
}
.btn:hover{
    letter-spacing: 3px;
}
        </style>
    </head>
    <body style="background-image: url(Images/appointment.png);" >
        <div class="header">
            <ul>
                <li style="float: left;;"><strong> Welcome User !! </strong> </li>

            </ul>
        </div>
        <div class="container" style="width: 100%;">
            <form method="POST">
                <button type="button" onclick="window.location.href='Booking.php'" class="btn" style="position: absolute;top: 40%;left: 30%;">Book Appointment</button><br><br>
                <button type="button" onclick="window.location.href='PatientsAppointment.php'" class="btn" style="position: absolute;top: 48%;left: 30%;">Show Appointment</button><br><br>
                <button type="button" onclick="window.location.href='CancelBooking.php'" class="btn" style="position: absolute;top: 56%;left: 30%;">Cancel Appointment</button><br><br>
                <button type="button" onclick="window.location.href='Home.php'" class="btn" style="position: absolute;top: 65%;left: 30%;">LOGOUT</button><br><br>
            </form>
        </div>
        <?php
        if(isset($_POST['check']))
        {   
            $conn=mysqli_connect('localhost','root','','appointment');
            if(isset($_POST['cancel']))
            {
        	header( "Refresh:1; url=CancelBooking.php"); 
            }
            if(isset($_POST['logout']))
            {
	            session_unset();
	            session_destroy();
	            header( "Refresh:1; url=Home.php"); 
            }
        }
        ?>
    </body>
</html>