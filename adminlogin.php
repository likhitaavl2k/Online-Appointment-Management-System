<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AdminLogin!</title>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/admincss.css" rel="stylesheet" media="all">
</head>

<body>
    <header style="position: absolute;top: 1%;">
        <a href="Home.php"><i class="fa fa-home fa-5x" ></i></a>
    </header>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3" >
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">AdminLogin</h2>
                    <form action="adminvalidate.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Admin Username" name="uname">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="psw" id="password">
                        </div>
                        <input type="checkbox" onclick="myFunction()" style="position: relative;left: -125px;"><label style="color: white;position: relative;left: 24px;top: -22px;" > Show Password</label>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>