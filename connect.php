<?php
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $project = $_POST['project'];
    $description = $_POST['description'];

    $conn = new mysqli('localhost','root','','clients');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into clients_details(fullName, email, project, description)
        values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$fullName, $email, $project, $description);
        $stmt->execute();
        echo "Details submitted successfully. I'll contact you soon....THANK YOU!!";
        $stmt->close();
        $conn->close();
    }
?>