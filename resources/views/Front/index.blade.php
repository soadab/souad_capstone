<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('Front/css/style.css') }}">

</head>
<body class="img js-fullheight" style="background-image: url({{ asset('Front/images/bg.jpg') }});">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h1 class="mb-4">Welcome</h1>
                <p><a href="{{ route('Admin.login') }}" class="btn btn-primary px-4 py-3">Login</a></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('Front/js/jquery.min.js') }}"></script>
<script src="{{ asset('Front/js/popper.js') }}"></script>
<script src="{{ asset('Front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Front/js/main.js') }}"></script>

</body>
</html>
