<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="assets/style1.css"> -->
</head>

<body>
    <div class="row">
        <div class="col-xs-1 center-block text-center">
            <section class="login-box">
                <h2>login Toraja Kawaa roastery</h2>
                <form id="loginform" method="GET" action="">
                    <label for="username" style="font-family: 'Times New Roman', Times, serif">Username</label>
                    <br />
                    <input type="text" placeholder="Username" name="username" />
                    <br />
                    <label for="password" style="
                text-align: justify;
                font-family: 'Times New Roman', Times, serif;
              ">Password</label>
                    <br />
                    <input type="text" placeholder="Password" name="password" />
                    <br />
                    <label for="confirmPassword" placeholder="Confirm Password" name="Confirm Password"></label>
                    <br>
                    <br />
                    <a href="{{ url('login') }}"></a>
                    <button type="submit" class="btn btn-success" value="Login">
                        Login
                    </button>
                    <a href="{{ url('/registration') }}">
                        <button type="submit" class="btn btn-warning" value="Signup" style="right: 50%">
                            Sign up
                        </button></a>
                </form>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>