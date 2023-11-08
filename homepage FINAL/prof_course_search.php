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
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Professor Tab</h1>
<h2 style = "font-size:large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Professor Course Search</h2>

<form method = "POST">
    <button type = submit style = "background-color:coral;" name = "main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "prof">Back to Professor Tab</button>

    <input type = "text" name = "search" placeholder = "Search Course #">
        <button type = "submit" style = "background-color:coral;" name = "submit_search">Search</button>
    </input>

    <!-- <input type = "text" name = "search_sec" placeholder = "Search Section #">
        <button type = "submit" style = "background-color:coral;" name = "submit_search_sec">Search</button>
    </input> -->

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
    else if(isset($_POST['search'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);       // Stores text value
        header("Location: prof_section.php?course=$search");
    }
// ---------------------------------------------------------------------------
?>