<?php
include 'connect.php';

if(isset($_POST['txt'])){
    $txt = $_POST['txt'];

    $sql = "SELECT id, first_name, last_name FROM users WHERE first_name LIKE '{$txt}%' ";

    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result) >0){
        while($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $ime = $row['first_name'];
            $prezime = $row['last_name'];
        
            echo '
            <tr>
                <td>'.$id.'</td>
                <td>'.$ime.'</td>
                <td>'.$prezime.'</td>
                <td>
                <a onclick="prikaziAuto('.$row['id'].')" class="waves-effect waves-light btn btn modal-trigger" data-target="modal1"><i class="material-icons left">drive_eta</i>Automobili</a>
                </td>
            </tr>
            ';
        };

    }else{
        echo "Nema korisnika sa tim imenom";
    }
}
?>