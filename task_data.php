<?php
// header('Content-Type : application/json; charset=utf-8');

include('db.php');
//check if arrau of id sended


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // …

    if (isset($_POST['quotes_id'])) {



        $exist = $_POST['quotes_id'];

        if (!is_array(($exist))) {
            //transfrom to array 
            $exist = json_decode($exist, true);
        }
        if (!is_array($exist)) {
            echo json_encode([


                'success' => false,
                'message' => 'bad data format '
            ]);
            exit();
        }

        //query of all quotes
        $sql = "SELECT * FROM quotes";

        //ignore quotes in array 

        $sql .= " WHERE id NOT IN ( '" . implode("','", $exist) . "' )";

        $data = $mysqli->query($sql);

        //check if any record exist 

        if ($data->num_rows < 1) {
            echo json_encode([


                'success' => false,
                'message' => 'no data found'
            ]);
            exit();
        } else {
            //return json of data
            while ($row = $data->fetch_assoc()) {
                $json[] = $row;
            }
            echo json_encode($json);
        }
    }
} else {
    //if not data sendedt
    echo json_encode([


        'success' => false,
        'message' => 'method not supported'
    ], true);
}
//close connection
$mysqli->close();
