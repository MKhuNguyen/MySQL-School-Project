<?php
    include_once 'sql_connect.php';     // SQL Server Connection
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Student CWID Search</title>
</head>
<stlye>
</stlye>
<body>
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Student Table</h1>
<h2 style = "font-size:large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Student CWID Search</h2>

<form method = "post">
    <button type = submit style = "background-color:coral;" name = "main" value = "Main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "student" value = "Student">Back to Student Tab</button>

    <input type = "text" name = "search_cwid" placeholder="Enter CWID">
        <button type = "submit" style = "background-color:coral;" name = "search_submit_cwid" >Search</button>
    </input>
</form>

<?php
    echo "<table border='1' cellspacing='2' cellpadding='2'>";
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
    // Back to Student Tab
    else if(isset($_POST['student'])){
        header("Location: student.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------   
    else if(isset($_POST['search_cwid'])){
        $search = mysqli_real_escape_string($conn, $_POST['search_cwid']);      // Stores text value
        // Selects all Students and their grades for all classes taken
        $sql = "SELECT DISTINCT * 
            FROM Students AS st 
            INNER JOIN Enroll_Records AS e ON e.student_cwid = st.cwid
            INNER JOIN Sections AS s ON s.section_id = e.section_id
            INNER JOIN Courses AS c ON c.course_number = s.course_num
            WHERE st.cwid = '$search';";

        $result = mysqli_query($conn, $sql);        // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population

        // Checks if query is populated
        if ($result_check > 0){
            echo "<tr><th>CWID</th><th>Student Name</th><th>Course #</th><th>
                    Course Name #</th><th>Grade</th></tr>";
            // Loop through query, row by row and output
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>".
                        $search."</td><td>".$row['student_fname']." ".
                        $row['student_lname']."</td><td>".
                        $row['course_number']."</td><td>".
                        $row['title']."</td><td>".
                        $row['grade'].
                    "</td></tr>"; 
            }
        }
        else{
            echo "0 results" . "<br>";
        }
    }
// ---------------------------------------------------------------------------   
?>
