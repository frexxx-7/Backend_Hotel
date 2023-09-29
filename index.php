<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include './classes/DBConnect.php';
$objDB = new DbConnect();
$conn = $objDB->connect();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":
        $user = json_decode(file_get_contents('php://input'));
        $sql = "INSERT INTO users(login, password) values (:login, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':login',$user->login);
        $stmt->bindParam(':password',$user->password);
        if($stmt->execute()){
            $response = ['status'=> 1, 'message' => 'Record create successfully.'];
        }else{
            $response = ['status'=> 0, 'message' => 'Failed to create record.'];
        }
        echo json_encode($response);
        break;
}


?>