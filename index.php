<?php
include 'db.php';
include 'page/header.php';
?>
<body>
    <div class="container-content">
        <div class="form-container">
            <form action="index.php" method="POST">
                <div class="form-message">
                    <h2>Enter the following<br> fields</h2>
                </div>
                <div class="field">
                    <span><img src="./icons/username.svg" alt=""></span>
                    <input type="text" name="usuario" id="nombre" placeholder="Enter your name" require>
                </div>
                <div class="field">
                    <span><img src="./icons/email.svg" alt=""></span>
                    <input type="email" name="email" id="email" placeholder="Enter your email" require>
                </div>
                <div class="field">
                    <span><img src="./icons/password.svg" alt=""></span>
                    <input type="password" name="password" id="password" placeholder="Enter your password" require>
                </div>
                <button type="submit" class="btn-hover color-1 " id="button-submit" name="submited">Add user</button>
                
            </form>
            
            <?php
        if(isset($_POST['submited'])){
            if(isset($_POST['usuario']) !== "" && isset($_POST['email']) !== "" && isset($_POST['password']) !== ""){
                $usuario = $_POST['usuario'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $insertar = "INSERT INTO usuario (usuario,password,email) VALUES ('$usuario', '$password', '$email')";
                $ejecutar = mysqli_query($con, $insertar);
            }
        }
        ?>
        </div>
        <?php include 'userList.php'?>
    </div>
</body>
</html>