<?php 
    include('./assets/php/filter.php');

    if ($_POST['website'] != "") {
        $currentState = "You filled an invisible field, are you a robot like me ?";
    }
    else {
        if ($firstname != "" AND $lastname != "" AND $_POST['gender'] != ""
        AND $email != "" AND $country != "" AND $message != "") {

            $currentState = "Everything is set correctly, a confirmation email has been send to you. ";
            $name = $_POST['firstname']. " " .$_POST['lastname'];
            $msg = "<br />Dear ".$name.",<br /><br />
                This is an automatic confirmation e-mail.<br />
                We correctly received your informations and we'll answer you as soon as possible.<br />
                <ul><li>Firstname: ".$firstname."</li>
                    <li>Lastname: ".$lastname."</li>
                    <li>Gender: ".$_POST['gender']."</li>
                    <li>E-mail: ".$email."</li>
                    <li>Country: ".$country."</li>
                    <li>Subject: ".$_POST['subject']."</li>
                    <li>Message: ".$message."</li></ul>
                Thanx for choosing Hackers Poulette, we wish you a great day!<br /><br />
                The Hackers Poulette Support Team
            ";
            include_once('./assets/php/mail.php');
            sendmail($email, $name, "Confirmation e-mail", $msg);
        }
        else {
            $currentState = "Some input fields aren't filled !";
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
                <div class="container col-6">
                    <label for="firstname">Firstname<?php echo "<em style='color:red;'>".$errors['firstname']."</em>"; ?></label>
                    <input name="firstname" id="firstname" class="form-control jsClass" type="text" value="<?php echo (isset($_POST['firstname']) ? $_POST['firstname'] : '' )?>">
                    <label for="lastname">Lastname<?php echo "<em style='color:red;'>".$errors['lastname']."</em>"; ?></label>
                    <input name="lastname" id="lastname" class="form-control jsClass" type="text" value="<?php echo (isset($_POST['lastname']) ? $_POST['lastname'] : '' )?>">
                    <label for="gender">Gender<?php echo "<em style='color:red;'>".$errors['gender']."</em>"; ?></label>
                    <select name="gender" id="gender" class="form-control jsClass">
                        <option value="" <?php echo (isset($_POST['gender'])) ? "" : "selected" ?>>...</option>
                        <option value="Female" <?php echo ($_POST['gender'] == "Female") ? "selected" : "" ?>>Female</option>
                        <option value="Male" <?php echo ($_POST['gender'] == "Male") ? "selected" : "" ?>>Male</option>
                        <option value="Other" <?php echo ($_POST['gender'] == "Other") ? "selected" : "" ?>>Other</option>
                    </select>
                </div>
                <div class="container col-6">
                    <label for="email">E-mail<?php echo "<em style='color:red;'>".$errors['email']."</em>"; ?></label>
                    <input name="email" id="email" class="form-control jsClass" type="email" placeholder="name@example.com" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : '' )?>">
                    <label for="country">Country<?php echo "<em style='color:red;'>".$errors['country']."</em>"; ?></label>
                    <input name="country" id="country" class="form-control jsClass" type="text" value="<?php echo (isset($_POST['country']) ? $_POST['country'] : '' )?>">
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject" class="form-control">
                        <option value="Other Issue" selected>Other Issue</option>
                        <option value="Administrative">Administrative</option>
                        <option value="Technical Support">Technical Support</option>
                        <option value="General Question">General Question</option>
                    </select>
                </div>
                <div class="form-group container col-12">
                    <label for="message">&nbsp;<?php echo "<em style='color:red;'>".$errors['message']."</em>"; ?></label>
                    <textarea name="message" id="message" class="form-control jsClass" rows="6" <?php echo (isset($_POST['message']) ? ">".$_POST['message'] : "placeholder='Enter your message here ...'>" )?></textarea>
                    <input id="website" name="website" type="text" />
                    <div class="text-center">
                        <input type="submit" name="button" class="btn center-block" value="Submit" />
                        <?php echo "<p><br />".$currentState."</p>"; ?>
                    </div>
                </div>
            </section>
        </form>
    </main>
    <footer>
        <p>&copy; Hackers Poulette 2020</p>
    </footer>

    <script src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>