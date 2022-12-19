
<?php
    require('connect/DB.php');
    if( isset($_POST['first_name']) && !empty($_POST['first_name'])){
        $upFirst = $_POST['first_name'];
        $upLast = $_POST['last_name'];
        $upEmailMobile = $_POST['email_number'];
        $upPassword = $_POST['up_password'];
        $birthDay = $_POST['birth_day'];
        $birthMonth = $_POST['birth_month'];
        $birthYear = $_POST['birth_year'];

        if (!empty($_POST['gen'])) {
            $upGen = $_POST['gen'];
        }

        $birth = '' . $birthYear . '-' . $birthMonth . '-' . $birthDay;
        if( empty($upFirst) or empty($upLast) or empty($upEmailMobile) or empty($upGen)){
            $error = 'All fields are required.';
        }
    }else{
        echo 'User not found';
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facebook</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="header" id="header"></div>
    <div class="main" id="main">
        <div class="left_side">
            <img src="assets/images/facebook Signin image.png" alt="">
        </div>

        <div class="right_side">
            <div class="error">
                <?php
                    if(!empty($error)){
                        echo $error;
                    }    
                ?>
            </div>


            <h1 class="title_h" style="color: #212121;">create an account</h1>

            <div class="description_h" style="font-size: 20px; color: #212121;">it is free and always be</div>

            <form action="sign.php" method="post" name="user-sign-up">
                <div class="sign_up_form">
                    <div class="sign_up_name">
                        <input type="text" name="first_name" id="first_name" class="text_field" placeholder="First Name">
                        <input type="text" name="last_name" id="last_name" class="text_field" placeholder="Last Name">

                    </div>

                    <div class="sign_wrap_mobile">
                        <input type="text" name="email_number" id="up_email" placeholder="Mobile Number Or Email Address" class="text_input">
                    </div>

                    <div class="sign_up_password">
                        <input type="password" name="up_password" id="up_password" class="text_input">
                    </div>

                    <div class="sign_up_birth">
                        <div class="bday">Birthday</div>
                        <div class="form_birthday">
                            <select name="birth_day" id="days" class="select_body"></select>
                            <select name="birth_month" id="months" class="select_body"></select>
                            <select name="birth_year" id="years" class="select_year"></select>
                        </div>
                    </div>

                    <div class="gender_wrap">
                        <input type="radio" name="gen" id="fem" value="female" class="m0">
                        <label for="fem" class="gender">Female</label>
                        <input type="radio" name="gen" id="male" value="male" class="m0">
                        <label for="male" class="gender">Male</label>
                    </div>

                    <div class="term">
                        By clicking on sign up, you agree to terms and conditions, data policy and cookie policy.
                        You will receive SMS notifications from us.
                    </div>

                    <input type="submit" value="Sign Up" class="sign-up">
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script>
        // display year
        for(i = new Date().getFullYear(); i>1900; i--){
            $("#years").append($('<option/>').val(i).html(i));
        }

        // display number of months
        for(i=1; i<13; i++){
            $("#months").append($('<option/>').val(i).html(i));
        }

        // number of days
        updateNumberOfDays();

        function daysInMonth(month, year){
            return new Date(year, month, 0).getDate();
        }

        function updateNumberOfDays(){
            $("#days").html('');
            month = $('#months').val();
            year = $('#years').val();
            day = daysInMonth(month, year);

            for(i=1; i<day+1; i++){
                $("#days").append($('<option/>').val(i).html(i));
            }
        }

        // updates the number of days according to year and month
        $('#years, #months').on('change', function(){
            updateNumberOfDays();
        });
    </script>
</body>
</html>