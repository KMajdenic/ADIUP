<?php
include_once '../includes/HeaderMentor.php';
require_once "../includes/config.php";
?>
<!DOCTYPE html>
<html>
    <body>
       
    <?php  
    if(isset($_POST['submit']))
    {
        echo"<table>
        <tr>
            <th>Naziv projekta</th>
            <th>Opis projekta</th>
            <th>Upisani studenti</th>
            <th></th>
        </tr>";

        $projectID=$_POST['projectID']; 
        $sql="SELECT ProjectID,Name,Description,StudentsAssigned FROM projects 
        WHERE ProjectID=$projectID;";
        $result=mysqli_query($db,$sql);
        $resultCheck=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        if($resultCheck ==1)
        {   
            
            echo "<tr><td>" .$row['Name']."</td><td>".$row['Description']."</td><td>"
            .$row['StudentsAssigned']."</td>";
            echo "</tr></table>";
        }else{echo "Neuspješno dohvaćanje projekta";}

        if($resultCheck==1 && $row['StudentsAssigned']!=0)
        {
        echo "<h1>————————————————————</h1> ";
        echo "<h2>Studenti na projektu</h2>";
        echo "<table>
                <tr>
                    <th>ID studenta</th>
                    <th>Ime i prezime</th>";
        $getstudents="SELECT ID,FullName FROM students WHERE ProjectID=$projectID;";
        $execgetstudents=mysqli_query($db,$getstudents);
        $getstudentsResult=mysqli_num_rows($execgetstudents);
        if($getstudentsResult>0)
        {
            while($getStudentsRows=mysqli_fetch_assoc($execgetstudents))
            {
                echo "<tr><td>" .$getStudentsRows['ID']."</td><td>"
                .$getStudentsRows['FullName']."</td></tr>";
            }
            echo "</table>"; 
        }
        }
        else
        {
            echo "Nema upisanih studenata!";
        }
        mysqli_close($db);
    }
    ?>
    </table>
    </body>
    <footer class="footer">Fakultet računarstva i informacijskih tehnologija, Osijek</footer>
</html>