<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up - The Advice Shop</title>
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
        
        <form method="post" style="display: inline-block; text-align: left;">
            <div style="margin-bottom: 16px;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" style="width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
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
