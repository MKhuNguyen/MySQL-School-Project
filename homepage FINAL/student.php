<?php
    include_once 'sql_connect.php';     // SQL Server Connection
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Database Homepage </title>
</head>
<stlye>
</stlye>
<body>
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Student Tab</h1>

<form method = "post">
    <button type = submit style = "background-color:coral;" name = "main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "all">Print Table</button>
    <button type = submit style = "background-color:coral;" name = "course_search">Course Search</button>
    <button type = submit style = "background-color:coral;" name = "cwid_search">CWID Grade Search</button>
    <select name = "selection" >
        <option value = "" disabled selected>Select</option>
        <option value = "cwid">CWID</option>
        <option value = "address">Address</option>
        <option value = "telephone">Telephone</option>
        <option value = "major">Major</option>
        <option value = "minors">Minors</option>
    </select>
    <button type = "submit" style = "background-color:coral;" name = "list" value = "selection" >View</button>
</form>

<?php
echo "<table border='1' cellspacing='2' cellpadding='2'>";
// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // Back to main menu
    if(isset($_POST['main'])){
        header("Location: index.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
   // Back to Course Search
   if(isset($_POST['course_search'])){
    header("Location: student_course_search.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // To CWID Search
    if(isset($_POST['cwid_search'])){
    header("Location: student_cwid_search.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // Show table
    if(isset($_POST['all'])){
        // Selects all student info
        $sql = "SELECT * 
            FROM Students AS s
            INNER JOIN Departments AS d ON s.major = d.dept_number
            INNER JOIN Student_Minors AS m ON s.cwid = m.student_cwid;";
            
        $result = mysqli_query($conn, $sql);        // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population

        // Checks if query is populated
        if ($result_check > 0){
            echo "<tr><th>Name</th><th>CWID</th><th>Address</th><th>Telephone</th><th>Major</th><th>Minor(s)</th></tr>";
            // Loop through query, row by row and output
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row['student_fname']." ".$row['student_lname']."</td><td>".
                    $row['cwid']."</td><td>".$row['student_address']."</td><td>".
                    $row['student_telephone']."</td><td>".$row['dept_name']."</td><td>".$row['minor'].
                    "</td></tr>";       
            }
        }
        else{
            echo " 0 results";
        }
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // Show selected values from dropdown
    else if(isset($_POST['list'])){
        $dropdown_val = $_POST['selection'];        // Stores dropdown selection
        // Select all professor info in SQL Database
        $sql = "SELECT * 
            FROM Students AS s
            INNER JOIN Departments AS d ON s.major = d.dept_number
            INNER JOIN Student_Minors AS m ON s.cwid = m.student_cwid;";

        $result = $conn->query($sql);       // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population

        // Checks if query is populated, then checks dropdown values for output
        if ($result_check > 0){
            if($dropdown_val == 'cwid'){
                echo "<tr><th>Name</th><th>CWID</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['student_fname']." ".$row['student_lname']."</td><td>".
                        $row['cwid'] . "</td></tr>";      
                }
            }
            else if($dropdown_val == 'address'){
                echo "<tr><th>Name</th><th>Address</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['student_fname']." ".$row['student_lname']."</td><td>".
                        $row['student_address'] . "</td></tr>";      
                }
            }
            else if($dropdown_val == 'telephone'){
                echo "<tr><th>Name</th><th>Telephone #</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['student_fname']." ".$row['student_lname']."</td><td>".
                        $row['student_telephone']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'major'){
                echo "<tr><th>Name</th><th>Major</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['student_fname']." ".$row['student_lname']."</td><td>".
                        $row['dept_name']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'minors'){
                echo "<tr><th>Name</th><th>Minor(s)</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['student_fname']." ".$row['student_lname']."</td><td>".
                        $row['minor']."</td></tr>";      
                }
            }
        }
        else{
            echo " 0 results" . "<br>";
        }
    }
// ---------------------------------------------------------------------------      
?>