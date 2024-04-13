<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('Front/css/style.css') }}">
</head>
<body class="img js-fullheight" style="background-image: url({{ asset('Front/images/bg.jpg') }});">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">User Message Center</h3>
                    <div class="container">
                        <h2>Bienvenue, {{ $user->name }}</h2>
                        
                        <h3>Messages reçus :</h3>
                        @if($messages->isEmpty())
                            <p>Aucun message disponible</p>
                        @else
                            <ul>
                                @foreach($messages as $message)
                                    <li>{{ $message->content }} - <strong>{{ $message->sender->email }}</strong></li>
                                @endforeach
                            </ul>
                        @endif

                        <form action="{{ route('Admin.sendMessage') }}" method="POST">
                            @csrf
                            <label for="receiver_email">Email du destinataire :</label>
                            <input type="email" name="receiver_email" id="receiver_email" required><br>
                            <textarea name="message" placeholder="Entrez votre message ici" required></textarea><br>
                            <button type="submit">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="text-right">
                    <form action="{{ route('Admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary px-4 py-3">Logout</button>
                    </form>
                    <a href="{{ route('download.database') }}">Télécharger la base de données</a><br>
                </div>
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
