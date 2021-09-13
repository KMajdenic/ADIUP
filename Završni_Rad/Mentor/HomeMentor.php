<?php
include_once '../includes/HeaderMentor.php';
require_once "../includes/config.php";
?>
<!DOCTYPE html>
<html>
    <body>
    <table>
        <tr>
            <th>Naziv projekta</th>
            <th>Opis projekta</th>
            <th>Upisani studenti</th>
            <th></th>
            </tr>
    <?php
        
        $sql="SELECT ProjectID,Name,Description,StudentsAssigned FROM projects;";
        $result=mysqli_query($db,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck > 0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<tr><td>" .$row['Name']."</td><td>".$row['Description']."</td><td>".$row['StudentsAssigned']."</td><td>";
                echo( '<form action="ProjectDetails.php" method="POST"> <input type="submit" name="submit" class="tablebtn" value="Pregledaj projekt">');
                echo ('</td><td><input type="hidden" name="projectID" value="'.$row['ProjectID'].'"</td></form></tr>');
            }
            echo "</table>";
        }
        else{echo "0 results";}
        
        
        
        mysqli_close($db);
        
    ?>      
    </body>
    <footer class="footer">Fakultet računarstva i informacijskih tehnologija, Osijek</footer>
</html>