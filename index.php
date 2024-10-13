<?php

require "dbBroker.php";
require "model/user.php";

session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $uname = $_POST["username"];
    $pass = $_POST["password"];

    $korisnik = new User(1, $uname, $pass);
    $odgovor = User::loginUser($korisnik, $conn);

    if ($odgovor->num_rows == 1) {
        echo `
        <script>
        console.log("Prijava uspesna!");
        </script>
        `;
        $_SESSION["user-id"] = $korisnik->$id;
        header("Location: home.php");
        exit();
    } else {
        echo `
        <script>
        console.log("Prijava neuspešna, pokušajte ponovo.");
        </script>
        `;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
