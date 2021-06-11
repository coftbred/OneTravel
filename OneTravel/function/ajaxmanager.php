<?php 
    include '../config.php';
    include '../classes/Post.php';

    if (isset($_POST['country'])) {
        $c_id = $_POST['country'];
        $des_name = getDestination_Name($c_id, $conn);
        echo json_encode($des_name);        
    }



    function getDestination_Name($c_id, $conn) {
        $sql = "SELECT des_name, c_id FROM destination WHERE c_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $c_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

?>