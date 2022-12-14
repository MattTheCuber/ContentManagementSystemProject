<?php
    $conn = mysqli_connect("mysql.localhost", "matthewvine", "password", "matthewvine");
    if (!$conn) die("Connection failed: " . mysqli_connect_error());
    $sql = "CREATE TABLE Comments (
            ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            title VARCHAR(200) NOT NULL,
            comments VARCHAR(5000) NOT NULL,
            commentdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        
    if ($conn->query($sql) === TRUE) {
        echo "Table Comments created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    mysqli_close($conn);
?>