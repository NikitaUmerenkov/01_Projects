<!DOCTYPE html>
<html>
<head>
    <title>3 project</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
    <div id="content"></div>
    <button id="loadBtn">Load Data</button>
    <script>
        $(document).ready(function(){
            $("#loadBtn").click(function(){
                $.ajax({
                    url: "secondIndex.php",
                    type: "GET",
                    success: function(data){
                        $("#content").html(data);
                    }
                });
            });
        });
    </script>
?>
</body>
</html>