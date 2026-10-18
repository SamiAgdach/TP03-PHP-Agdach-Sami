<?php
session_start();

$error = '';
$login = trim((string) ($_POST['login'] ?? ''));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($login === '') {
        $error = 'Veuillez saisir un login valide.';
    } else {
        $_SESSION['login'] = $login;
        setcookie('dernier_login', $login, time() + 86400, '/');
        header('Location: profil.php');
        exit;
    }
}

$dernierLogin = trim((string) ($_COOKIE['dernier_login'] ?? ''));
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
    <?php if ($error !== ''): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Login : <input type="text" name="login" value="<?php echo htmlspecialchars($dernierLogin); ?>" required></label>
        <button type="submit">Connexion</button>
    </form>
</body>
</html>
