<?php
    require_once "header.php";
    // kojom metodom(nacinom) smo dosli na ovu stranicu signup.php
    // GET ili POST
    // lokalne promenljive - unutar funkcije ($x)
    // globalne promenljive - van funkcije ($x)
    // superglobalne promenljive - ($_GET, $_POST, $_SERVER, $_COOKIE, $_FILES)
    // var_dump($_SERVER);
    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $connection->real_escape_string($_POST['username']);
        $password = $connection->real_escape_string($_POST['password']);
        if($username == "" || $password == "") {
            $error = "All fields are required!";
        }
        else {
            $result = querymysql("SELECT * FROM users WHERE username = '$username' ");
            // $result - rezultat izvrsenja upita
            if($result->num_rows > 0) {
                // korisnik sa ovim usernamemom vec postoji
                $error = "that username is taken - please choose another one!";
            }
            else {
                // upis novog korisnika
             $codedPassword = PASSWORD_HASH($password, PASSWORD_DEFAULT);
             querymysql("INSERT INTO users(username, password)
                    VALUES('$username', '$codedPassword')");
                    header("Location: login.php");
            }
        }
    }
    
?>
    <div class="content">
        <h2>Create a new account</h2>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <form action="signup" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Your username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Your password">
        <br>
        <input type="submit" value="signup">
        </form>
    </div>

</div>
</body>
</html> 