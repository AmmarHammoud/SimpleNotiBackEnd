<html>
    <head></head>
    <body>
        <from method = "POST" action = "/noti">
            @csrf
            <input type = "text" placeholder = "alert"/>
            <input type = "submit" vlaue = "send"/>
        </from>
    </body>
</html>