<?php 
if (!isset($_SESSION['login'])){$_SESSION['login'] = false;}
if (filter_input(INPUT_POST,
                'belepesiAdatok',
                FILTER_VALIDATE_BOOLEAN,
                FILTER_NULL_ON_FAILURE)) {
    //-- A kapott adatok feldolgozása    
    $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'InputPassword'));

    if ($db->login($username, $password)) {
        
        $_SESSION['login'] = true;
        header("Location: index.php");
        $_SESSION['username'] = 'Lajos';
        $_SESSION['password'] = 'Lajos';
    }
}
?>

<div class="container">
    <form action="#" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Név</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="InputPassword" name="InputPassword">
        </div>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="InputEmail" name="InputEmail">
        </div>

        <button type="submit" class="btn btn-primary" name="belepesiAdatok" value="true">Belépés</button>
    </form>
    <a href="index.php?menu=regisztracio">Regisztráció</a>
 </div>