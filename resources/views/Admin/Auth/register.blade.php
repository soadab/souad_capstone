<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('Front/css/style.css')}}">
</head>
<body class="img js-fullheight" style="background-image: url({{ asset('Front/images/bg.jpg') }});">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Register</h3>
                    <form action="{{ route('Admin.register') }}" method="POST" class="signin-form">
                        @csrf <!-- Ajoutez cette ligne pour inclure le jeton CSRF -->

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <p class="text-muted">Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-100 text-center">
                                <span>Already have an account? </span><a href="{{ route('Admin.login') }}">Login here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('Front/js/jquery.min.js')}}"></script>
<script src="{{asset('Front/js/popper.js')}}"></script>
<script src="{{asset('Front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Front/js/main.js')}}"></script>

</body>
</html>
