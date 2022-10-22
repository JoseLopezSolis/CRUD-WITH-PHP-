<?php
include 'db.php';
include 'page/header.php';
?>
    <main>
            <div class="main-header">
                <h2>User list</h2>
            </div>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Password</th>
                <th>Operacion</th>
            </tr>
                <?php
                $query = "SELECT * FROM usuario";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                            <td><?php echo $row['idUser'] ?></td>
                            <td><?php echo $row['usuario'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td>
                            <div class="buttons">
                                <a id="edit-user" href="editForm.php?idUser=<?php echo $row['idUser'];?>"><img class="icons" src="./icons/edit.svg" alt=""></a>
                                <a id="delete-user" href="index.php?borrar=<?php echo $row['idUser'] ?>"> <img class="icons" src="./icons/remove.svg" alt=""></a>
                            </div>
                            </td>
                            <?php
                            if(isset($_GET['borrar'])){
                                $borrar_id = $_GET['borrar'];
                                $borrar = "DELETE FROM usuario WHERE idUser = '$borrar_id'";
                                $ejecutar = mysqli_query($con, $borrar);
                                if($ejecutar){
                                    echo "<script>window.open('index.php', '_self')</script>";
                                }
                            }
                            ?>
                    </tr>
                <?php } ?>
                    </tr>
        </table>
        </main>
    </div>