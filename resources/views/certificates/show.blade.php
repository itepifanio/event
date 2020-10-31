<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EventUp - Event and Conference</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <main class="container">
        <div class="border">
            <header class="header">
                <img src="{{ asset('event-home/img/logo.png') }}" alt="EventUP">
                <h1>CERTIFICADO DE PARTICIPAÇÃO</h1>
            </header>
            <section class="content">
                <p>Certificamos que </p>
                <h2>{{$user->name}}</h2>
                <p>participou do evento <b>{{$event->name}}</b> realizado de <b>{{\Carbon\Carbon::parse($event->start_date)->format('d/m/Y')}}</b> até <b>{{\Carbon\Carbon::parse($event->end_date)->format('d/m/Y')}}</b>.</p>
            </section>
            <footer class="footer">
                <p>Realização: </p>
                <b>{{$organization->name}}</b>
            </footer>
        </div>
    </main>
</body>

</html>
