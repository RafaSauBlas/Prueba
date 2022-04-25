<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script type="text/javascript" src="http://www.google.com/jsapi?key=INSERT-YOUR-KEY"></script>
<script type="text/javascript">
  google.load("jquery", "1.4.2");
  google.load("swfobject", "2.2");
  google.setOnLoadCallback(function() {
    $(function() {
      // Place init code here instead of $(document).ready()
    });
  });
</script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var PUSHER_APP_KEY = "7eb4fd7d4f7d603dec81"
    var pusher = new Pusher(PUSHER_APP_KEY, {
      cluster: 'mt1',
      forceTLS: true
    });

    var channel = pusher.subscribe('channel-tercerMetodo');
    channel.bind('event-tercerMetodo', function(data) {
      // alert(JSON.stringify(data));

      const message = data.data
      var node = document.createElement("LI");
      var textnode = document.createTextNode(message.valor);
      node.appendChild(textnode);
      document.getElementById("myList").appendChild(node);

      if(message.valor == 1)
      {
        console.log(data.data)
        window.location.href = "http://127.0.0.1:8000/home";

      }
      else{

        window.location.href = "http://127.0.0.1:8000/tokenLogout";
      }

});



  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Intenta publicar un evento en el canal <code>mi-canal</code>
    con nombre del evento <code>mi-evento</code>.
  </p>

  <ul id="myList">
    <li>Primer mensaje</li>
  </ul>

</body>
