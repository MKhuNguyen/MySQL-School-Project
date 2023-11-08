<?php
    include_once 'sql_connect.php';     // SQL Server Connection
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Database Homepage </title>
</head>
<body>
<body>
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">CPSC 332 Database</h1>
<p></p>

<?php
    echo "Welcome to the CPSC 332 Database!" . "<br>";
?>

<form method = "post">
    <button type = submit style = "background-color:coral;" name = "professors" value = "Professors">Professors</button>
    <button type = submit style = "background-color:coral;"name = "students" value = "Students">Students</button?>
</form>

<?php
// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // To Student Tab
    if(isset($_POST['students'])){
        header("Location: student.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // To Student Tab
    if(isset($_POST['professors'])){
        header("Location: professor.php");
    }

// ---------------------------------------------------------------------------
?>