<?php
 /*Variable used to notify user whether or not password entered is valid.*/
$is_invalid = false;
/*Method to detect whether or not the form has been submitted*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $mysqli = require __DIR__ . "/database.php";
    
     /*Check that email and password entered into the form actually match one of the records in login_db*/
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
     /*To execute, we call query method on the mysqli object, and assign returned result to a variable*/               
    $result = $mysqli->query($sql);
    
     /*To get the data from the result object, call the fetch_assoc() method. This returns record, if found, as an associative array. It is then assigned to a variable.*/
    $user = $result->fetch_assoc();
   
     /*Check that user variable contains an array of data and isn't null.*/
    if ($user) {
        
        /*If record is found for entered email address, check password.*/
        /*To verify that the hash matches the plain text password, we use the password_verify() function.*/
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - The Advice Shop</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
    <style>
        /* Adjust button width and padding */
        button {
            width: auto;
            padding: 10px 20px;
            background-color: grey;
            border: thin solid black;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Hover effect for button */
        button:hover {
            background-color: #A8CFB1;
        }

        /* Center the button */
        .button-container {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("inc_header.php"); ?>
    <?php include("inc_nav.php"); ?>    
    <div style="text-align: center;">
        <h1>Login</h1>
        <?php if ($is_invalid): ?>
            <em style="color: red; display: block; text-align: center;">Invalid login</em>
        <?php endif; ?>
        <form method="post" style="display: inline-block; text-align: left;">
            <div style="margin-bottom: 16px;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" style="width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            
            <div style="margin-bottom: 16px;">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" style="width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <div class="button-container">
                <button>Log in</button>
            </div>
        </form>
    </div>
    <?php include("inc_footer.php"); ?>
</body>
</html>
