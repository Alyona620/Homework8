<?php

defined('_JEXEC') or die;
?>

<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#popup1").reveal();
        });
        function PopUpShow(){
            $("#popup1").show();
        }
        function PopUpHide(){
            $("#popup1").hide();
        }
    </script>
    <style type="text/css">
        {
            font-family: Areal;
        }

        .b-popup{
            width:100%;
            min-height:100%;
            background-color:
                overflow:hidden;
            position:fixed;
            z-index: 100;
            top:0px;
            left: 0px;
        }
        .b-popup .b-popup-content{
            margin:50px auto auto auto;
            width:300px;
            height: 300px;
            padding:30px;
            background-color: #BCF0F7;
            border-radius:5px;
            box-shadow: 0px 0px 10px #000;
        }

    </style>

</head>
<body>
<div class="b-container">

    <div class="b-popup" id="popup1">
        <div class="b-popup-content">
            "Hello World!"
            <br><br>
            <a href="javascript:PopUpHide()">Close</a>
        </div>
    </div>
</div>
</body>
</html>