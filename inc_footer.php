<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<footer>
    <p class="copyright">&copy; 2024, The Advice Shop.</p>
    <p class="user" style="float: right; margin-right: 10px;">
        <?php if (isset($user)): ?>
            Hello <?= htmlspecialchars($user["name"]) ?> | <a href="logout.php">Log out</a>
        <?php else: ?>
            <a href="login.php">Log in</a> or <a href="signup.php">Sign up</a>
        <?php endif; ?>
    </p>
</footer>
</html>
