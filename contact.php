<?php



include("connect.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $inquiry = $_POST['inquiry'];



    
    if (!empty($first_name) && !empty($last_name) && !is_numeric($first_name) && !is_numeric($last_name)) {
        $query = "insert into client(first_name, last_name, email, phone_number, inquiry) values( '$first_name', '$last_name', '$email', '$phonenumber', '$inquiry')";
        $result =  mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result)>0) {
                $user_data = mysqli_fetch_assoc($result);
            }
        }
    } else {
        echo "Please enter Your first name and last name";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/facicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuka Yamamoto</title>


    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Oswald:wght@400;500&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/38dd725bed.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        div.message {
            font-size: 12px;
            margin: 4px 0;
            color: lightgray;
            display: none;
        }

        div.error {
            color: red;
        }

        div.success {
            color: green;
        }

        .imgerror {
            width: 20px;
            height: 20px;
            display: none;
        }

        .imgsuccess {
            width: 20px;
            height: 20px;
            display: none;
        }
    </style>


    <script>
        $(document).ready(function() {

            $('#first_name').focus(function() {
                $('#first_name-message').show();
            });
            $('#first_name').blur(function() {
                $('#first_name-message').hide();
            });

            $('#first_name').keyup(function() {
                if (!check_name($(this).val())) {

                    $("#first_name-message").removeClass("success").addClass("error").html("Required");
                    $("#first_name-success").hide();
                    $("#first_name-error").show();
                } else {
                    $("#first_name-message").removeClass("error").addClass("success").html("Success");
                    $("#first_name-error").hide();
                    $("#first_name-success").show();

                }
            });


            $('#last_name').focus(function() {
                $('#last_name-message').show();
            });

            $('#last_name').blur(function() {
                $('#last_name-message').hide();
            });

            $("#last_name").keyup(function() {

                if (!check_name($(this).val())) {
                    $("#last_name-message").removeClass("success").addClass("error").html("Required");
                    $("#last_name-success").hide();
                    $("#last_name-error").show();
                } else {
                    $("#last_name-message").removeClass("error").addClass("success").html("Success");
                    $("#last_name-error").hide();
                    $("#last_name-success").show();

                }

            });


            $('#email').focus(function() {
                $('#email-message').show();
            });
            $('#email').blur(function() {
                $('#email-message').hide();
            });

            $("#email").keyup(function() {

                if (!check_Email($(this).val())) {
                    $("#email-message").removeClass("success").addClass("error").html(
                        "The format is expected abc@abc.com");
                    $("#email-success").hide();
                    $("#email-error").show();
                } else {
                    $("#email-message").removeClass("error").addClass("success").html("Success");
                    $("#email-error").hide();
                    $("#email-success").show();

                }

            });


            $('#phonenumber').focus(function() {
                $('#phonenumber-message').show();
            });
            $('#phonenumber').blur(function() {
                $('#phonenumber-message').hide();
            });

            $("#phonenumber").keyup(function() {

                if (!check_PhoneNumber($(this).val())) {
                    $("#phonenumber-message").removeClass("success").addClass("error").html(
                        "The format is expected 1234567890");
                    $("#phonenumber-success").hide();
                    $("#phonenumber-error").show();
                } else {
                    $("#phonenumber-message").removeClass("error").addClass("success").html("Success");
                    $("#phonenumber-error").hide();
                    $("#phonenumber-success").show();

                }

            });

        });




        function check_name(name) {

            if (isNaN(name)) {
                if (1 <= name.length) {
                    return true;
                }
            } else
                return false;

        }


        function check_Email(email) {
            return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i
                .test(email);
        }


        function check_PhoneNumber(phoneNumber) {
            var regExp = /^[\+]?([0-9][\s]?|[0-9]?)([(][0-9]{3}[)][\s]?|[0-9]{3}[-\s\.]?)[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            var phone = phoneNumber.match(regExp);
            if (phone) {
                return true;
            }
            return false;
        }
    </script>

    <!-- Googlemap -->
    <script>
        function initMap() {
            var mylocation = {
                lat: 49.272535,
                lng: -123.095804
            }


            var map = new google.maps.Map(document.getElementById("google_map"), {
                zoom: 10,
                center: mylocation
            });

            var marker = new google.maps.Marker({
                position: mylocation,
                map: map,
                title: 'Great Pyramid of Giza'
            });

            var mapStyle = [{
                "stylers": [{
                    "saturation": -100
                }]
            }];
            var mapType = new google.maps.StyledMapType(mapStyle);
            map.mapTypes.set('GrayScaleMap', mapType);
            map.setMapTypeId('GrayScaleMap');
        }
    </script>



</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class=" navbar-brand" href="index.php">YukaYamamoto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse  navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  pull-right me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contactMe.html">CONTSCT ME</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <section class="main">


        <div class="row">
            <div class="col-12 contactMe_bg">
                <h1>CONTACT FORM</h1>
            </div>
        </div>

        <div class="container">
            <div class="row ">
                <div class="col-12  text-center contact">
                    <form method="post">
                        <table class="contact-table">

                            <tr>
                                <th class="contact-item">First name</th>
                                <td class="contact-body">
                                    <input type="text" id="first_name" name="first_name" class="form-text"
                                        placeholder="Input your first name" required>
                                    <img src="image/ErrorMessage.png" alt="Errormessage" class="imgerror"
                                        id="first_name-error">
                                    <img src="image/success.png" alt="Successmessage" class="imgsuccess"
                                        id="first_name-success">
                                    <div class="message" id="first_name-message">Required</div>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">Last name</th>
                                <td class="contact-body">
                                    <input type="text" id="last_name" name="last_name" class="form-text"
                                        placeholder="Input your last name" required>
                                    <img src="image/ErrorMessage.png" alt="Errormessage" class="imgerror"
                                        id="last_name-error">
                                    <img src="image/success.png" alt="Successmessage" class="imgsuccess"
                                        id="last_name-success">
                                    <div class="message" id="last_name-message">Required</div>
                                </td>
                            </tr>

                            <tr>
                                <th class="contact-item">Email</th>
                                <td class="contact-body">
                                    <input type="email" id="email" name="email" class="form-text"
                                        placeholder="Input your email" />
                                    <img src="image/ErrorMessage.png" alt="Errormessage" class="imgerror"
                                        id="email-error">
                                    <img src="image/success.png" alt="Successmessage" class="imgsuccess"
                                        id="email-success">
                                    <div class="message" id="email-message">The format is expected abc@abc.com</div>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">Phone number</th>
                                <td class="contact-body">
                                    <input type="tel" id="phonenumber" name="phonenumber"
                                        placeholder="Input your phonenumber" class="form-text" />
                                    <img src="image/ErrorMessage.png" alt="Errormessage" class="imgerror"
                                        id="phonenumber-error">
                                    <img src="image/success.png" alt="Successmessage" class="imgsuccess"
                                        id="phonenumber-success">
                                    <div class="message" id="phonenumber-message">The format is expected 1234567890
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="contact-item">Contents of inquiry</th>
                                <td class="contact-body">
                                    <textarea name="inquiry" maxlength="500" class="form-textarea"
                                        placeholder="Please write in 500 characters or less."></textarea>
                                </td>
                            </tr>

                        </table>

                        <input class="button" type="submit">
                    </form>
                    <a href="output.php">View information</a>
                </div>
                
            </div>
        </div>

        <div class="contactMe_container">

            <div class="boxs emailBox">
                <a href="mailto: yamamoto_yuka@hotmail.com">
                    <p class="email">E-mail</p>
                </a>
            </div>

            <div class="boxs resumeBox">
                <a href="sample.pdf" target="_blank">
                    <p class="resume">Resume</p>
                </a>
            </div>

            <div class="boxs addressBox">
                <p class="address">333 Terminal Ave #400, Vancouver, BC V6A 4C1 </p>
            </div>

            <div id="google_map" class="boxs google_map"></div>
        </div>


        <div class="footer_sns">
            <div class="sns_list">


                <a href="https://www.linkedin.com/company/linkedin/" target="_blank"><i class="fab fa-linkedin"
                        aria-label="linkedin"></i></a>

                <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"
                        aria-label="facebook"></i></a></li>

                <a href="https://github.com/" target="_blank"><i class="fab fa-github" aria-label="github"></i></a>

                <a href="https://twitter.com/Twitter?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                    target="_blank"><i class="fab fa-twitter" 　aria-label="twitter"></i></a>
                <a href="https://www.instagram.com/instagram/?hl=en" target="_blank"><i class="fab fa-instagram"
                        aria-label="instagram"></i></a>


            </div>
        </div>

    </section>


</body>
<!-- google map -->
<!-- My API Key = AIzaSyBCxH9ATQqPCkf-Rpyv9mN22618XGBhAiY -->
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCxH9ATQqPCkf-Rpyv9mN22618XGBhAiY&callback=initMap">
</script>



</html>