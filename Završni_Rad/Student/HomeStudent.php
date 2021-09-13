<?php
require_once '../includes/HeaderStudent.php';
require_once "../includes/config.php";
include_once "ProjectAssign.php";

?>
<!DOCTYPE html>
<html>
    <body>
<?php    
    echo "<table>
        <tr>
            <th>Naziv projekta</th>
            <th>Opis projekta</th>
            <th>Upisani studenti</th>
            <th></th>
        </tr>";
        $sql="SELECT ProjectID,Name,Description,StudentsAssigned FROM projects;";
        $result=mysqli_query($db,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck > 0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>" .$row['Name']."</td><td>".$row['Description']."</td><td>".$row['StudentsAssigned']."</td><td>";
                echo( '<form action="" method="POST"> <input type="submit" name="submit" class="tablebtn" value="Upiši projekt">');
                echo ('</td><td><input type="hidden" name="projectID" value="'.$row['ProjectID'].'"</td></form></tr>');
            }
            echo "</table>";
        }
        else{echo "Nema rezultata";}
        echo $alert;
        mysqli_close($db);
    ?>   
    </table>
    </body>
    <footer class="footer">Fakultet računarstva i informacijskih tehnologija, Osijek</footer>
</html>

