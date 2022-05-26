
<html>
    <body bgcolor=almondbleeched>
        <style>
            tr{
                cellpadding : 5px;
            }
            
            #btn{
                padding: 8px;
                background : antiquewhite;
                color : black;
                position: relative;
                margin : 5px ;
                border-radius :10px;
                
            }
        </style>
    <table cellpadding=5px cellspacing=10px>
    <form method="POST" action="">
        <h1><center>Employee Details</center></h1><hr>    
        <tr><td>Employee Name :</td><td> <input type="text" name="empname"></td></tr><br>
        <tr><td>Employee ID :</td><td><input type="text" name="empid"></td></tr>
        <tr><td>Employee NO :</td><td><input type="text" name="empno"></td></tr>
        <tr><td>Salary :</td><td><input type="text" name="sal"></td></tr>
    </table><br><br>
    
    <input type="submit" name="insert" id="btn" value="INSERT"/>&nbsp;&nbsp;
    <input type="submit" name="update" id="btn" value="UPDATE"/>&nbsp;&nbsp;
    <input type="submit" name="delete" id="btn" value="DELETE"/>&nbsp;&nbsp;
    <input type="submit" name="view" id="btn" value="VIEW"/>&nbsp;&nbsp;<br><br><br><br>
        
</form>
<?php
if(isset($_POST['empname']))
{
    $empname=$_POST['empname'];
}
if(isset($_POST['empid']))
{
    $empid=$_POST['empid'];
}
if(isset($_POST['empno']))
{
    $empno=$_POST['empno'];
}
if(isset($_POST['sal']))
{
    $sal=$_POST['sal'];
}
$conn=new mysqli("localhost","root","","employee");
if($conn==false){
    die("ERROR : could not connect".mysqli_connect_error());
}
if(isset($_POST['insert'])){
    $sql="insert into empdet(empname,empid,empno,sal) values('$empname','$empid','$empno','$sal')";

if(mysqli_query($conn,$sql)){
    echo "Record inserted successfully";
}
else{
    echo "Record could not inserted";
}
}
if(isset($_POST['update'])){
    $sql = "update empdet set empname='$empname',empid='$empid',empno='$empno',sal='$sal' where empid='$empid'";
    if(mysqli_query($conn, $sql)){
        echo "Record updated successfully";
    }
    else{
        echo "Record have not updated";
    }
}
if(isset($_POST['delete'])){
    if($_POST['empid']){
        $empid=$_POST['empid'];
    }
    $sql="delete from empdet where empid='$empid'";
    if(mysqli_query($conn,$sql)){
        echo "recored deleted successfully";
    }
    else{
        echo "record has not deleted";
    }
}
if(isset($_POST['view']))
{
    $result=mysqli_query($conn,"select * from empdet");
    echo "<table border=1 cellspacing =5px cellpadding =5px >
    <th>EMPNAME</th>
    <th>EMPID</th>
    <th>EMPNO</th>
    <th>SALARY</th>";
    while($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['empname']."</td>";
        echo "<td>".$row['empid']."</td>";
        echo "<td>".$row['empno']."</td>";
        echo "<td>".$row['sal']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
mysqli_close($conn);
?>
</body>
</html>    
          
