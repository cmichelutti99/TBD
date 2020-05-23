<html>
    <head>
        
    <title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    
    
</head>
<body style= "background: rgba(148, 216, 255, 1)">
    
    
    <div class="container">
        <div class="login-box">
        <div class="row">
        <div class="col-md-6">
            <h2> Login Here </h2>
            <form action="validation.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user_name" class="form-control" required>
                    </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    </div>
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="register.php">Register here</a>
                </div>
                    
                </form>
        </div>
     </div>
</div>
</div>
    
    
</body>
</html>
