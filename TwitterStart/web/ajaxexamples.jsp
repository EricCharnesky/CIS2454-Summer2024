
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<%-- https://www.includehelp.com/java/ajax-request-in-jsp-an-example.aspx --%>

<script type="text/javascript">
    function loadAjax() {
        var username = document.getElementById("username").value;
        var url = "/TwitterStart/GetImage?username=" + username;
        console.log(url);
        if (window.XMLHttpRequest) {
            request = new XMLHttpRequest();
        }
        try {
            request.onreadystatechange = sendInfo;
            request.responseType = "blob";
            request.open("GET", url, true);
            request.send();
        } catch (e) {
            console.log("Unable to connect server");
        }
    }
    function sendInfo() {
        if (request.readyState == 4) {
            var result = document.getElementById("result");
            var img = document.createElement('img');
            img.length = 200;
            img.width = 100;
            img.src = window.URL.createObjectURL(request.response);
            result.appendChild(img);
        }
    }
</script>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Images with AJAX</title>
    </head>
    <body>
        <h2>Image from database!</h2>

    <div id="data">
        <label>User Name</label>
        <input type="text" id="username" name="username"><br>
    </div>
    <div id="buttons">
        <label>&nbsp;</label>
        <input type="button" onclick="loadAjax()" value="Fetch"><br>
    </div>
        
    <p id="result"></p>

    </body>
</html>
