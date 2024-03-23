<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up - The Advice Shop</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="C:\xampp\htdocs\theadviceshop\js\validation.js" defer></script>
    <style>
        /* Add custom styles for uniform input boxes */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

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
        <h1>Create an account</h1>
        
        <form action="process-signup.php" method="post" id="signup" novalidate style="display: inline-block; text-align: left;">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            
            <div>
                <label for="password_confirmation">Repeat password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <!-- Button container for centering -->
            <div class="button-container">
                <button>Sign up</button>
            </div>
        </form>
    </div>
    <?php include("inc_footer.php"); ?>
</body>
</html>
