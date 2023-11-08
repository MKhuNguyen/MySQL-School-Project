<?php
    include_once 'sql_connect.php';     // SQL Server Connection
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Professor SSN Search</title>
</head>
<stlye>
</stlye>
<body>
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Professor Tab</h1>
<h2 style = "font-size:large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Professor SSN Search</h2>

<form method = "POST">
    <button type = submit style = "background-color:coral;" name = "main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "prof">Back to Professor Tab</button>
    
    <input type = "text" name = "search" placeholder = "Search SSN For Class Info">
        <button type = "submit" style = "background-color:coral;" name = "submit_search">Search</button>
    </input>

</form>


<?php
    echo "<table border='1' cellspacing='2' cellpadding='2'>";      // Table Format
// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // Back to Main Menu
    if(isset($_POST['main'])){
        header("Location: index.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// --------------------------------------------------------------------------- 
    // Back to Professor Tab
    if(isset($_POST['prof'])){
        header("Location: professor.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------    
    else if(isset($_POST['search'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);       // Stores text value
        // Selects all Sections taught by a certain professor through SSN
        $sql = "SELECT *
            FROM Professors AS p
            INNER JOIN Sections AS s ON p.prof_ssn = s.professor_ssn
            INNER JOIN Courses AS c ON s.course_num = c.course_number
            WHERE p.prof_ssn = '$search';";
        
        $result = mysqli_query($conn, $sql);        // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population
        
        // Checks if query is populated
        if ($result_check > 0) {
            echo "<tr><th>Prof_Name</th><th>Prof_SSN</th><th>Title</th><th>Course #</th><th>
                Section #</th><th>Classroom</th><th>Meeting Days</th><th>Beginning Time</th><th>End Time</th>";
            // Loop through query, row by row and output
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".
                        $row['prof_fname']." ".$row['prof_lname']."</td><td>".
                        $row['prof_ssn']."</td><td>".$row["title"]."</td><td>".
                        $row['course_number']."</td><td>".$row['section_number']."</td><td>".
                        $row["classroom"]."</td><td>".$row["meeting_days"]."</td><td>".
                        $row["beginning_time"]."</td><td>".$row["end_time"].
                    "</td></tr>";
            }
        }
        else {
            echo "0 results";
        }
    }
// ---------------------------------------------------------------------------
?>