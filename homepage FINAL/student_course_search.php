<?php
    include_once 'sql_connect.php';     // SQL Server Connection
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Student Course Search</title>
</head>
<stlye>
</stlye>
<body>
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Student Table</h1>
<h2 style = "font-size:large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Student Course Search</h2>

<form method = "post">
    <button type = submit style = "background-color:coral;" name = "main" value = "Main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "student" value = "Student">Back to Student Tab</button>
 
    <input type = "text" name = "search_course" placeholder="Enter Course #">
        <button type = "submit" style = "background-color:coral;" name = "search_submit_course" >Search</button>
    </input>

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
    // Back to student
    else if(isset($_POST['student'])){
        header("Location: student.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------  
    else if(isset($_POST['search_course'])){
        $search = mysqli_real_escape_string($conn, $_POST['search_course']);        // Stores text value
        // Selects all unique/non-duplicated sections in a course
        $sql = "SELECT DISTINCT *, COUNT(e.section_id) AS T
            FROM Courses AS c 
            INNER JOIN Sections AS s ON s.course_num = c.course_number
            INNER JOIN Enroll_Records AS e ON e.section_id = s.section_id 
            WHERE c.course_number = '$search'
            GROUP BY e.section_id;";

        $result = mysqli_query($conn, $sql);        // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population

        // Checks if query is populated
        if ($result_check > 0){
            echo "<tr><th>Course #</th><th>Section #</th><th>Classroom</th><th>Meeting Days</th><th>
                    Beginning Time</th><th>End Time</th><th># of Enrolled Students</th><th># of Total Seats</th></tr>";
            // Loop through query, row by row and output
            while ($row = mysqli_fetch_assoc($result)){ 
                echo "<tr><td>".
                        $search."</td><td>".$row['section_number']."</td><td>".
                        $row['classroom']."</td><td>".$row['meeting_days']."</td><td>".
                        $row['beginning_time']."</td><td>".
                        $row['end_time']."</td><td>".$row['T']."</td><td>".
                        $row['num_of_seats'].
                    "</td></tr>"; 
            }
        }
        else{
            echo "0 results" . "<br>";
        }
    }
// ---------------------------------------------------------------------------   
?>