<?php 
    include '../config.php';
    include '../classes/Post.php';

    if (isset($_POST['country'])) {
        $country_name = $_POST['country'];
        $c_id = getCountry_ID($country_name, $conn);
        $des_name = getDestination_Name($c_id, $conn);

        echo json_encode($des_name);
        
    }

    function getCountry_ID($country_name, $conn) {
        $sql = "SELECT c_id FROM country WHERE c_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $country_name);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    function getDestination_Name($c_id, $conn) {
        $sql = "SELECT des_name FROM destination WHERE c_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $c_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

?>