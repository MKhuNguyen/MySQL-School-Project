<?php
    include_once 'sql_connect.php';
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Professor Course Search</title>
</head>
<stlye>
</stlye>
<body>
<h3 style = "font-size:large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Section Search</h3>

<form method = "POST">
    <button type = submit style = "background-color:coral;" name = "main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "prof">Back to Professor Tab</button>
    <button type = submit style = "background-color:coral;" name = "course">Back to Course Search</button>

    <input type = "text" name = "search" placeholder = "Search Section #">
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
    else if(isset($_POST['prof'])){
        header("Location: professor.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // Back to Professor Tab
    else if(isset($_POST['course'])){
        header("Location: prof_course_search.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    else if(isset($_POST['search'])){
        $course = $_GET['course'];
        $search_sec = mysqli_real_escape_string($conn, $_POST['search']);       // Stores text value
        // Select grades from records and count each distinct one
        $sql = "SELECT e.grade, count(*) AS T
            FROM Courses AS c
            INNER JOIN Sections AS s ON s.course_num = c.course_number
            INNER JOIN Enroll_Records AS e ON e.section_id = s.section_id
            WHERE s.section_number = '$search_sec' AND c.course_number = '$course'
            GROUP BY grade;";

        $result = mysqli_query($conn, $sql);        // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population
        
        // Checks if query is populated
        if ($result_check > 0) {
            echo "<tr><th>Course #</th><th>Section #</th><th>Grade</th><th># of</th></tr>";
            // Loop through query, row by row and output
            while($row = mysqli_fetch_assoc($result)) {
                echo 
                    "<tr><td>".
                        $course."</td><td>".
                        $search_sec."</td><td>".
                        $row['grade']."</td><td>".
                        $row['T'].
                    "</td></tr>";
            }
        }
        else {
            echo "0 results";
        }
    }

