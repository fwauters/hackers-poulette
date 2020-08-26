<?php
    if ($_POST['website'] != "") {
        print_r("This field is invisible, are you a robot like me ?");
    }
    else {
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['gender'],
        $_POST['email'], $_POST['country'], $_POST['message'])) {

            print_r("Everything is set ! ");
            $name = $_POST['firstname']. " " .$_POST['lastname'];
            $msg = "Dear ".$name.",<br />
                This is an automatic confirmation e-mail.<br />
                We correctly received your informations and we'll answer you as soon as possible.<br />
                <ul><li>Firstname: ".$_POST['firstname']."</li>
                    <li>Lastname: ".$_POST['lastname']."</li>
                    <li>Gender: ".$_POST['gender']."</li>
                    <li>E-mail: ".$_POST['email']."</li>
                    <li>Country: ".$_POST['subject']."</li>
                    <li>Subject: ".$_POST['subject']."</li>
                    <li>Message: ".$_POST['message']."</li></ul>   
            ";
            include_once('./assets/php/mail.php');
            sendmail($_POST['email'], $name, "Confirmation e-mail", $msg);
        }
        else {
            print_r("Every input fields aren't filled !");
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="François Wauters">
	<meta name="description" content="Code practice, Hackers Poulette support contact form">
	<meta name="keywords" content="Code practice, Hackers Pouette, support, contact, form">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/img/hackers-poulette-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Hackers Poulette - Support</title>
</head>
<body>
    <header class="container text-center">
        <img src="./assets/img/hackers-poulette-logo.png" alt="Hackers Poulette's logo" height="120">
        <nav>
            <ul class="leftNav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
            </ul>
            <ul class="rightNav">
                <li class="active"><a href="#">Support</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <h1 class="text-center">Support Team</h1>
        <h2 class="text-center">Contact form:</h2>
        <form method="post" action="index.php">
            <section class="row">
                <section class="container col-6">
                    <label for="firstname">Firstname</label>
                    <input name="firstname" class="form-control" type="text">
                    <label for="lastname">Lastname</label>
                    <input name="lastname" class="form-control" type="text">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Other" selected>Other</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </section>
                <section class="container col-6">
                    <label for="email">E-mail</label>
                    <input name="email" class="form-control" type="email" placeholder="name@example.com">
                    <label for="coutry">Country</label>
                    <input name="country" class="form-control" type="text">
                    <label for="subject">Subject</label>
                    <select name="subject" class="form-control">
                        <option value="other" selected>Other Issue</option>
                        <option value="admin">Administrative</option>
                        <option value="support">Technical Support</option>
                        <option value="question">General Question</option>
                    </select>
                </section>
                <section class="form-group container col-12">
                    <label for="message"></label>
                    <textarea name="message" class="form-control" rows="6" placeholder="Enter your message here ..."></textarea>
                    <input id="website" name="website" type="text"></input>
                    <section class="text-center">
                        <input type="submit" class="btn center-block" value="Submit"></input>
                    </section>
                </section>
            </section>
        </form>
    </main>
    <footer>
        <p>&copy; Hackers Poulette 2020</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>