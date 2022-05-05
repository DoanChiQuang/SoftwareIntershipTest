<?php
    include('DB.php');
    $p = new DB();    
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {        
            font-family: Arial, Helvetica, sans-serif;
        }
        * {
            box-sizing: border-box;
        }

        input[type=text],
        input[type=email],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=button] {
            background-color: grey;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        input[type=button]:hover {
            background-color: #a6b3ac;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 50%;
            margin: auto;                             
        }
        p {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <p id="successful" style="color: green">SUBMIT FORM SUCCESSFUL</p>
        <p id="unsuccessful" style="color: red">SUBMIT FORM UNSUCCESSFUL</p>
        <p id="blank" style="color: orange">PLEASE FILL INFORMATION</p>
        <form method="post">            
            <label for="fname">Họ và Tên</label>
            <input type="text" id="fname" name="fullnametxt" placeholder="Họ và Tên..">

            <label for="email">Email</label>
            <input type="email" id="email" name="emailtxt" placeholder="Email..">            

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phonetxt" placeholder="Số điện thoại.."> 

            <label for="contact">Nội dung liên hệ</label>
            <textarea id="contact" name="contacttxt" placeholder="Nội dung liên hệ.." style="height:200px"></textarea>

            <input type="submit" value="Submit" name="submit">
            <input type="button" value="Clear" id="clear">
        </form>
        <?php
            if(isset($_POST['submit']) && $_POST['submit']=="Submit") {                
                $fname = $_POST['fullnametxt'];
                $email = $_POST['emailtxt'];
                $phone = $_POST['phonetxt'];
                $contact = $_POST['contacttxt'];
                
                if($fname!='' && $email!='' && $phone!='' && $contact!='') {                    
                    $sql = "INSERT INTO `information` (`name`,`email`,`phone`,`contact`) VALUES ('$fname','$email','$phone','$contact')";                                        
                    if($p->insert($sql)==1) {
                        echo '
                            <script>
                                document.getElementById("successful").style.display = "block";
                                document.getElementById("unsuccessful").style.display = "none";
                                document.getElementById("blank").style.display = "none";
                            </script>
                            ';
                    }
                    else {
                        echo '
                            <script>
                                document.getElementById("successful").style.display = "none";
                                document.getElementById("unsuccessful").style.display = "block";
                                document.getElementById("blank").style.display = "none";
                            </script>
                            ';
                    }                    
                }
                else {
                    echo '
                        <script>
                            document.getElementById("blank").style.display = "block";
                            document.getElementById("successful").style.display = "none";
                            document.getElementById("unsuccessful").style.display = "none";
                        </script>
                            ';
                }
                                    
            }
        ?>
    </div>
<script>
document.getElementById("clear").onclick = function() {
    document.getElementById("fname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("contact").value = "";
};
</script>
</body>
</html>
