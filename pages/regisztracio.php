<?php
if (filter_input(INPUT_POST, "regisztraciosAdatok", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $name = htmlspecialchars(filter_input(INPUT_POST, "name"));
    $username = htmlspecialchars(filter_input(INPUT_POST, "InputUsername"));
    $pass1 = filter_input(INPUT_POST, "InputPassword");
    $pass2 = filter_input(INPUT_POST, "InputPassword2");
    $email = htmlspecialchars(filter_input(INPUT_POST, "InputEmail"));
    $igazolvanyszam = htmlspecialchars(filter_input(INPUT_POST, "InputIgazolvany"));
    var_dump($pass1, $pass2);
    if ($pass1 == $pass2) {
        $db->register($igazolvanyszam, $username, $email, $name, $pass1);
        header("Location: index.php");
    } else {
        echo '<p>Nem egyeznek a jelszavak!</p>';
    }
}
?>
<div class="container">
    <form action="#" method="post">
        <div class="mb-3 row">
            <label for="name" class="form-label">Név</label>
            <input type="text" class="form-control" id="name" name="name" minlength="3" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3 row">
            <label for="InputUsername" class="form-label">Felhasználó név</label>
            <input type="text" class="form-control" id="InputUsername" name="InputUsername" minlength="3" required>
        </div>
        <div class="mb-3 row">
            <label for="InputPassword" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="InputPassword" name="InputPassword" minlength="3" required>
        </div>
        <div class="mb-3 row">
            <label for="InputPassword2" class="form-label">Jelszó megerősítés</label>
            <input type="password" class="form-control" id="InputPassword2" name="InputPassword2"  minlength="3"required>
        </div>
        <div class="mb-3 row">
            <label for="InputEmail" class="form-label">E-mail cím</label>
            <input type="email" class="form-control" id="InputEmail" name="InputEmail" minlength="3" required>
        </div>
        <div class="mb-3 row">
            <label for="InputIgazolvany" class="form-label">Igazolványszám</label>
            <input type="text" class="form-control" id="InputIgazolvany" name="InputIgazolvany" minlength="3" required>
        </div>
       
        <button type="submit" class="btn btn-primary" name="regisztraciosAdatok" value="true">Regisztráció</button>
    </form>
</div>
