<?php

    include "../../../cores/inc/config_c.php";
    include "../../../cores/inc/var_c.php";
    include "../../../cores/inc/functions_c.php";
    include "../../../cores/inc/auth_c.php";

    $uset = $_SESSION['u_set'];

    $query = "SELECT 
                `credit_id`,`store`,`borrower`,`lender`,`second_party_id`,`second_party_table`,`total_amount`,
                `amount_paid`,`status`,`created_at`,`due_date`
              FROM 
                `credit_tbl`
              WHERE
                `store` = '$uset' AND `transaction_type` = 'credit' ORDER BY `id` DESC;";
    $result = mysqli_query($link,$query);

    if (!$result) {
        die("Could not fetch credit transactions. ".mysqli_error($link));
    }

    $array = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    echo '{"data":';
    echo json_encode($array);
    echo '}';

?>