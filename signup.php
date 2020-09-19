<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <?php require_once('assets/bootstrap.php'); ?>
    <style>
    .container
    {
        width:30%;
    }
    #errorEmail,#passPolicy,#errorPass{
        color:red;
    }
    @media only screen and (max-width:1024px){
     .container{
            width:45%;
        }

    }
    @media only screen and (max-width:768px){
     .container{
            width:90%;
        }

    }
    </style>
    <script type="text/javascript">

        //---------------------------------------------------------------------------------------------------
        // --------------------------------FUNCTION FOR EMAIL ID VALIDAION-----------------------------------
        //---------------------------------------------------------------------------------------------------
        function emailValid(){
                var em = document.getElementById('email').value; //Fetching value from EMAIL input field.
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(regex.test(em)){
                    document.getElementById('errorEmail').innerHTML='';
                    document.getElementById('b1').disabled= false;
                }
                else{
                    document.getElementById('errorEmail').innerHTML='Invalid Email Address';
                    document.getElementById('b1').disabled= true;
                }
            }
        //---------------------------------------------------------------------------------------------------
        // -----------------------------END OF FUNCTION FOR EMAIL ID VALIDATION------------------------------
        //---------------------------------------------------------------------------------------------------


        //---------------------------------------------------------------------------------------------------
        //-------------------------------------FUNCTION FOR PASSWORD POLICY----------------------------------
        //---------------------------------------------------------------------------------------------------
        function passPol(){
                var pswd = document.getElementById('pwd').value;
                var regex =  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

                if (regex.test(pswd)){
                    document.getElementById('passPolicy').innerHTML='';
                    document.getElementById('b1').disabled = false;
                }
                else{
                    document.getElementById('passPolicy').innerHTML= '<br>Password Policy :<br/><ul><li>at least One UpperCase</li><li>at least One LowerCase</li><li>at least One Special Char.</li><li>at least One Digit</li><li>Min 6 Chars Long</li><li>Max 16 Chars Long</li></ul>';
                    document.getElementById('b1').disabled = true; 
                }
            }
        //---------------------------------------------------------------------------------------------------
        //-----------------------------------END OF FUNCTION FOR PASSWORD POLICY-----------------------------
        //---------------------------------------------------------------------------------------------------


        //---------------------------------------------------------------------------------------------------
        //-------------------------------------FUNCTION FOR PASSWORD MATCHING--------------------------------
        //---------------------------------------------------------------------------------------------------
        function confirmPass(){
                var pass = document.getElementById('pwd').value; //Fetching value from PASSWORD input field.
                var conpass = document.getElementById('repwd').value; //Fetching value from CONFIRM PASSWORD input field.

                //check whether the given two password is same or not

                if(pass == conpass){
                    document.getElementById('errorPass').innerHTML='Password match';
                    document.getElementById('b1').disabled = false ; //button gets enabled
                }
                else{
                    document.getElementById('errorPass').innerHTML='Password does not match';
                    document.getElementById('b1').disabled = true ;  //button gets disbaled
                }
            }
        //---------------------------------------------------------------------------------------------------
        //------------------------------END OF FUNCTION FOR PASSWORD MATCHING--------------------------------
        //---------------------------------------------------------------------------------------------------


        //---------------------------------------------------------------------------------------------------
        //-----------------------------------FUNCTION FOR PASSWORD TOGGLE------------------------------------
        //---------------------------------------------------------------------------------------------------
        function passTogg(){
                var pass = document.getElementById('pwd');
                var conpass = document.getElementById('repwd');

                var ch = document.getElementById('ch1');

                    if (ch.checked){
                        pass.type = conpass.type = 'text' ;
                    }
                    else
                    {
                        pass.type = conpass.type = 'password';
                    }
            }
        //---------------------------------------------------------------------------------------------------
        //--------------------------------END OF FUNCTION FOR PASSWORD TOGGLE--------------------------------
        //---------------------------------------------------------------------------------------------------

    </script>
</head>
<body>
<!---------------------------------------------------------------------------------------------->
<!----------------------------START OF COLLAPSING NAVIGATION BAR-------------------------------->
<!---------------------------------------------------------------------------------------------->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Pradipta Panjal</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                </div>
            </div>
        </nav>
<!---------------------------------------------------------------------------------------------->
<!---------------------------END OF COLLAPSING NAVIGATION BAR----------------------------------->
<!---------------------------------------------------------------------------------------------->

<!---------------------------------------------------------------------------------------------->
<!-----------------------------------SIGNUP FORM------------------------------------------------>
<!---------------------------------------------------------------------------------------------->

        <div class="container">
            <h3 style="text-align:center;">SignUp</h3>
            <form action="data.php" method="post" enctype="multipart/form-data">

            <!---------------------------------------------------------------------------------------------->
            <!-----------------------------------------NAME FIELD START------------------------------------->
            <!---------------------------------------------------------------------------------------------->
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!-----------------------------------------NAME FIELD END--------------------------------------->
            <!---------------------------------------------------------------------------------------------->

            
            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------------USERNAME FIELD START------------------------------------->
            <!---------------------------------------------------------------------------------------------->
                <div class="form-group">
                    <label>User Name:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your User Name">
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!------------------------------------USERNAME FILED END---------------------------------------->
            <!---------------------------------------------------------------------------------------------->


            <!---------------------------------------------------------------------------------------------->
            <!------------------------------------EMAIL FIELD START----------------------------------------->
            <!---------------------------------------------------------------------------------------------->
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required onkeyup="emailValid()" autocomplete="off">
                    <span id="errorEmail"><!--Error Show--></span>
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!-----------------------------------EMAIL FIELD END-------------------------------------------->
            <!---------------------------------------------------------------------------------------------->


            <!---------------------------------------------------------------------------------------------->
            <!----------------------------------PASSWORD FIELD START---------------------------------------->
            <!---------------------------------------------------------------------------------------------->
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter your Password" required onkeyup="passPol()" autocomplete="off">
                    <!----------------------------Adding a checkbox for password toggle-------------------------------->
                    <input type="checkBox" name="ch1" id="ch1" onchange="passTogg()"><label style="color: rgb(0,0,0);">Show/Hide</label> 
                    <span id="passPolicy"><!--Error Show--></span>
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!------------------------------------PASSWORD FIELD END---------------------------------------->
            <!---------------------------------------------------------------------------------------------->


            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------RETYPE PASSWORD FIELD START------------------------------------>
            <!---------------------------------------------------------------------------------------------->
                <div class="form-group">
                    <label>Retype Password:</label>
                    <input type="password" class="form-control" id="repwd" name="repwd" placeholder="Confirm your Password" onkeyup="confirmPass()" required autocomplete="off">
                    <span id="errorPass"><!--Error Show--></span>
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------RETYPE PASSWORD FIELD END-------------------------------------->
            <!---------------------------------------------------------------------------------------------->


            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------GENDER FIELD START------------------------------------>
            <!---------------------------------------------------------------------------------------------->
            <div class="form-group">
                    <label>Gender:</label>
                    <input type="radio" id="gen" name="gen" value="male" required>Male
                    <input type="radio" id="gen" name="gen" value="female" required>Female
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------GENDER FIELD END-------------------------------------->
            <!---------------------------------------------------------------------------------------------->




            <!---------------------------------------------------------------------------------------------->
            <!-----------------------------------IMAGE UPLOAD FIELD START----------------------------------->
            <!---------------------------------------------------------------------------------------------->
            <div class="form-group">
            <label for="">Image Upload:</label>
            <input type="file" id="file" name="file" accept="image/*" required class="form-control" >
            </div>
            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------------IMAGE UPLOAD FIELD END----------------------------------->
            <!---------------------------------------------------------------------------------------------->


            <!---------------------------------------------------------------------------------------------->
            <!-----------------------------------SUBMIT BUTTON START---------------------------------------->
            <!---------------------------------------------------------------------------------------------->
                <div>
                    <button type="submit" name="btnSubmit" id="b1" class="btn btn-primary btn-block">Submit</button>
                </div>
            <!---------------------------------------------------------------------------------------------->
            <!-------------------------------------SUBMIT BUTTON END---------------------------------------->
            <!---------------------------------------------------------------------------------------------->
            </form>
            <?php
            if(isset($_GET['error'])){?>
                <div style="margin-top:2vh;text-align:center;" class="alert alert-danger"><?php echo "Having problem with signup" ?></div>
            <?php
            }
            ?>
        </div>
<!---------------------------------------------------------------------------------------------->
<!-----------------------------------END OF SIGNUP FORM----------------------------------------->
<!---------------------------------------------------------------------------------------------->
</body>
</html>