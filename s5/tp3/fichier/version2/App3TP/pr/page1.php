<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Sign up</h1>
            <form method="POST" action="info.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <button type="submit" name="SignUp" class="btn btn-success btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="animation.js"></script>
</body>

</html>
