<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="jFile.js"></script>
    <title>Login</title>
</head>
<body>
    <p>Login page</p>
    
    
    <form action='authenticate.php' method='post' id='login'>
        <input type='text' name='user_name' placeholder=user_name required><br>
        <input type='password' name='password' placeholder=password required><br>
        <button type='submit'>Login</button>
        </form>
    
    <input type='button' name='toggle' value='Register' onclick="toggleView(document.getElementById('login'),document.getElementById('newUser')),this.style.display='none';">
    
    <form action='createAccount.php' method='post' id='newUser' style="display:none;">
        <input type='text' name='user_name' placeholder=user_name required><br>
        <input type='password' name='password' placeholder=password required><br>
        <input type="email" name='email' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder=email required><br>
        <button type='submit'>Sign Up</button>
        </form>
    </body>
</html>