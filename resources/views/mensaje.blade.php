<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="chat">
        <div class="top"></div>

        <div class="message">
            @include('receive', ['message' => 'hola'])
        </div>

        <div class="botoom">
            <form id="messageForm">
                <input type="text" id="message" placeholder="Escribir..." autocomplete="off">
                <button type="submit"></button>
            </form>
        </div>
    </div>
</body>

<script>
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'eu'
    });
    const channel = pusher.subscribe('public');

    // Recibe el mensaje
    channel.bind('chat', function(data) {
        $.post("/receive", {
                _token: '{{ csrf_token() }}', // Aquí corregido el error de crsf_token()
                message: data.message,
            })
            .done(function(res) {
                $(".message").last().after(res); // Aquí corregido el selector de clase
                $(document).scrollTop($(document).height());
            });
    });

    // Envia el mensaje
    $("#messageForm").submit(function(event) { // Aquí corregido el selector de ID y el nombre de la función
        event.preventDefault();

        $.ajax({
            url: "/broadcast",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token() }}',
                message: $("#message").val()
            },
            success: function (res) {
                $(".message").last().after(res);
                $("#message").val('');
                $(document).scrollTop($(document).height());
            }
        });
    });
</script>

</html>
