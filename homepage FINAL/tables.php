<?php
    include_once 'sql_connect.php';
?>

<?php
//  CREATING TABLES
// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Departments (
//         dept_number VARCHAR(20) NOT NULL PRIMARY KEY,
//         dept_name VARCHAR(20) NOT NULL,
//         office_location VARCHAR(50) NOT NULL,
//         chairperson VARCHAR(50) NOT NULL,
//         telephone VARCHAR(10) NOT NULL
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Departments created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Professors (
//         prof_fname VARCHAR(20) NOT NULL,
//         prof_lname VARCHAR(20) NOT NULL,
//         prof_ssn VARCHAR(9) NOT NULL PRIMARY KEY,
//         title VARCHAR(30),
//         salary VARCHAR(50) NOT NULL,
//         dept_num VARCHAR(20), FOREIGN KEY (dept_num) REFERENCES Departments(dept_number),
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Professors created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Students (
//         student_fname VARCHAR(20) NOT NULL,
//         student_lname VARCHAR(20) NOT NULL,
//         cwid  VARCHAR(30) NOT NULL PRIMARY KEY,
//         student_address VARCHAR(50) NOT NULL,
//         telephone VARCHAR(50) NOT NULL,
//         major VARCHAR(30), FOREIGN KEY (major) REFERENCES Departments(dept_number),
//         minors VARCHAR(50)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Students created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Sections (
//         section_id VARCHAR(20) NOT NULL PRIMARY KEY,
//         section_number VARTCHAR(20) NOT NULL,
//         classroom VARCHAR(30) NOT NULL,
//         num_of_seats VARCHAR(30) NOT NULL,
//         meeting_days VARCHAR(30) NOT NULL,
//         beginning_time TIME(6) NOT NULL,
//         end_time TIME(6) NOT NULL,
//         course_num VARCHAR(20), FOREIGN KEY (course_num) REFERENCES Courses(course_number),
//         professor_ssn VARCHAR(20), FOREIGN KEY (professor_ssn) REFERENCES Professors(prof_ssn)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Sections created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Courses (
//         course_number VARCHAR(20) NOT NULL PRIMARY KEY,
//         title VARCHAR(20) NOT NULL,
//         textbook VARCHAR(20),
//         units VARCHAR(10),
//         prereq VARCHAR(30),
//         dept_num VARCHAR(20), FOREIGN KEY (dept_num) REFERENCES Department(dept_number)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Courses created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Prof_Degrees (
//         degree_name VARCHAR(50) NOT NULL,
//         prof_ssn VARCHAR(50), FOREIGN KEY (prof_ssn) REFERENCES Professors(prof_ssn)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Prof_Degrees created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Prof_Addresses (
//         street_address VARCHAR(50) NOT NULL,
//         city VARCHAR(20) NOT NULL,
//         state VARCHAR(20) NOT NULL,
//         zip VARCHAR(10) NOT NULL,
//         prof_ssn VARCHAR(50), FOREIGN KEY (prof_ssn) REFERENCES Professors(prof_ssn)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Prof_Addresses created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Prof_Telephones (
//         telephone VARCHAR(7) NOT NULL,
//         area_code VARCHAR(3) NOT NULL,
//         prof_ssn VARCHAR(50), FOREIGN KEY (prof_ssn) REFERENCES Professors(prof_ssn)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Prof_Telephones created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Enroll_Records (
//         grade VARCHAR(3) NOT NULL,
//         section_id VARCHAR (20), FOREIGN KEY (course_num) REFERENCES Sections(section_id),
//         student_cwid VARCHAR(50), FOREIGN KEY (student_cwid) REFERENCES Students(cwid)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Prof_Telephones created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

// //---------------------------------------------------------------------------------------------------------------

//     $sql = "CREATE TABLE Student_Minors (
//         minor VARCHAR(50),
//         student_cwid VARCHAR(10), FOREIGN KEY (student_cwid) REFERENCES Students(cwid)
//         )";

//     if ($conn->query($sql) === TRUE) {
//         echo "Table Sections created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }

//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
    $conn->close();
?>