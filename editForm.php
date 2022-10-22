<?php
include 'db.php';
include 'page/header.php';
$idUser = $_GET['idUser'];
?>
    <main id="edit-form">
            <div class="main-header">
                <h2>Edit user</h2>
                <br>
                <h4>Fill the next fields then enter to save</h4>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
                <?php
                $query = "SELECT * FROM usuario WHERE idUser = '$idUser'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['idUser']?><input type="hidden" name="concurrentUserId" value="<?php echo $row['idUser']?>"></td>
                            <td><input placeholder="Fill Username" name="username" class="edit-user" type="text" value="<?php echo $row['usuario']?>"></td>
                            <td><input placeholder="Fill Email" name="email"  class="edit-user"  type="text" value="<?php echo $row['email']?>"></td>
                            <td><input placeholder="Fill Password" name="password" class="edit-user" type="text" value="<?php echo $row['password']?>"></td>
                    </tr>
                <?php } ?>
            </tr>
        </table>
                <button type="submit" name="edit" class="edit-record-button btn-hover color-1">Upload data</button>
                <?php
                //edit record
                if(isset($_POST['edit'])){
                    $idUser = $_POST['concurrentUserId'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $query = "UPDATE usuario SET usuario = '$username', email = '$email', password = '$password' WHERE idUser = '$idUser'";
                    $result = mysqli_query($con, $query);
                    if($result){
                        echo "<script>window.open('index.php', '_self')</script>";
                    }
                }
                ?>
        </form>
        </main>
    </div>