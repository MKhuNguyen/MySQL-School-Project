<?php
    include_once 'sql_connect.php';     // SQL Server Connection
?>

<html>
    <head>
    <meta charset="UTF-8">
    <title>Professor Tab</title>
</head>
<stlye>
</stlye>
<body>
<h1 style = "font-size:xx-large; color:royalblue; text-align:left; font-family:Copperplate; background-color:aliceblue; outline-color:black">Professor Tab</h1>

<form method = "POST">
    <button type = submit style = "background-color:coral;" name = "main">Main Menu</button>
    <button type = submit style = "background-color:coral;" name = "all">List All Professor Info</button>
    <button type = submit style = "background-color:coral;" name = "ssn">SSN Class Search</button>
    <button type = submit style = "background-color:coral;" name = "course_search">Course Grades Search</button>
    <select name = "selection" >
        <option value = "" disabled selected>Select</option>
        <option value = "ssn">SSN</option>
        <option value = "sex">Sex</option>
        <option value = "title">Title</option>
        <option value = "salary">Salary</option>
        <option value = "telephone">Telephone</option>
        <option value = "address">Address</option>
        <option value = "degree">Degree</option>
    </select>
    <button type = "submit" style = "background-color:coral;" name = "list" value = "selection" >View</button>
</form>

<?php
echo "<table border='1' cellspacing='2' cellpadding='2'>";  // Table Format

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
    // To SSN Search
    if(isset($_POST['ssn'])){
        header("Location: prof_ssn_search.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // To Course Search
    if(isset($_POST['course_search'])){
        header("Location: prof_course_search.php");
    }

// ---------------------------------------------------------------------------
// COMPLETE
// ---------------------------------------------------------------------------
    // Show table
    if(isset($_POST['all'])){
        // Select all professor info in SQL Database
        $sql = "SELECT *
                FROM Professors AS p
                    INNER JOIN Prof_Addresses AS a ON p.prof_ssn = a.prof_ssn
                    INNER JOIN Prof_Telephones AS t ON p.prof_ssn = t.prof_ssn
                    INNER JOIN Prof_Degrees AS d ON p.prof_ssn = d.prof_ssn
                    ORDER BY p.prof_ssn;"; 
        
        
        $result = mysqli_query($conn,$sql);       // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population

        // Checks if query is populated
        if ($result_check > 0){
            echo 
                "<tr><td>".
                    "<b>Name<b>"."</td><td>"."<b>SSN<b>"."</td><td>"."<b>Sex<b>"."</td><td>"."<b>Title<b>"."</td><td>". 
                    "<b>Salary<b>"."</td><td>"."<b>Telephone<b>"."</td><td>"."<b>Address<b>"."</td><td>"."<b>Degree<b>".
                "</td></tr>";
            // Loop through query, row by row and output
            while ($row = mysqli_fetch_assoc($result)){
                echo
                    "<tr><td>".
                        $row["prof_fname"]." ".$row["prof_lname"]."</td><td>".$row["prof_ssn"]."</td><td>".
                        $row["sex"]."</td><td>".$row["title"]."</td><td>$".$row["salary"]."</td><td>".
                        $row["area_code"]. "/". $row["telephone"]."</td><td>".$row["street_address"]. ", ".
                        $row["city"]. ", ".$row["state"]. ", ". $row["zip"]."</td><td>".$row["degree_name"].
                    "</td></tr>";     
            }
        }
        else{
            echo " 0 results";
        }
    }

    
// ---------------------------------------------------------------------------
//  COMPLETE
// ---------------------------------------------------------------------------
    // Show selected values from dropdown
    else if(isset($_POST['list'])){
        $dropdown_val = $_POST['selection'];        // Stores dropdown selection
        // Select all professor info in SQL Database
        $sql = "SELECT * 
                FROM Professors AS p
                    INNER JOIN Prof_Addresses AS a ON p.prof_ssn = a.prof_ssn
                    INNER JOIN Prof_Telephones AS t ON p.prof_ssn = t.prof_ssn
                    INNER JOIN Prof_Degrees AS d ON p.prof_ssn = d.prof_ssn;";
                    
        $result = mysqli_query($conn, $sql);        // Stores query from SQL selection
        $result_check = mysqli_num_rows($result);       // Counts the number of row in the query, check for population
        
        // Checks if query is populated, then checks dropdown values for output
        if($result_check > 0){
            if ($dropdown_val == 'ssn'){
                echo "<tr><th>Name</th><th>SSN</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>". 
                        $row['prof_ssn']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'title'){
                echo "<tr><th>Name</th><th>Title</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>".
                        $row['title'] . "</td></tr>";      
                }
            }
            else if($dropdown_val == 'sex'){
                echo "<tr><th>Name</th><th>Sex</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>". 
                        $row['sex']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'salary'){
                echo "<tr><th>Name</th><th><b>Salary</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>$".
                        $row['salary']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'address'){
                echo "<tr><th>Name</th><th>Address</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>". 
                        $row['street_address'].", ". $row['city'].", ". 
                        $row['state'].", ". $row['zip']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'telephone'){
                echo "<tr><<th>Name</th><th>Telephone #</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>". 
                        $row['area_code']."/".$row['telephone']."</td></tr>";      
                }
            }
            else if($dropdown_val == 'degree'){
                echo "<tr><th>Name</td><th>Degree</th></tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['prof_fname']." ".$row['prof_lname']."</td><td>". 
                        $row['degree_name']."</td></tr>";      
                }
            }
        }
    }
// ---------------------------------------------------------------------------
?>