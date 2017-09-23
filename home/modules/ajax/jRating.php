<?php

$aResponse['error'] = false;

$aResponse['message'] = '';

include('home_start.php');

// ONLY FOR THE DEMO, YOU CAN REMOVE THIS VAR

$aResponse['server'] = '';

// END ONLY FOR DEMO


if (isset($_POST['action'])) {
    if (htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating') {

        $id = intval($_POST['idBox']);

        $rate = floatval($_POST['rate']);

        $user = input($_POST['user']);

        // if request successful

        $success = true;


        // json datas send to the js file

        if ($success) {

            if (($rate - round($rate)) > 0) {

                $rate = round($rate);
            }

            if (($rate - round($rate)) < 0) {

                $rate = round($rate) - 0.5;
            }



            $Product = new Product();



            if ($user != '') {

                $Product->saveRate($id, $rate, $user);

                $rateUs = GetOneRow("rate_date", "rate_product", "user = '" . $user . "' and product_id = " . $id . " order by id desc limit 1");

                $commentUs = GetOneRow("date_comment", "user_comment", "user = '" . $user . "' and id_product = " . $id . " order by id limit 1");

                if (abs($rateUs["rate_date"] - $commentUs['date_comment']) <= 1000) {

                    updateScore($user, "add", 15, ACTION_COMMENT);
                }
            }



            $aResponse['message'] = 'Your rate has been successfuly recorded. Thanks for your rate :)';



            // ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER

            $aResponse['server'] = '<strong>Success answer :</strong> Success : Your rate has been recorded. Thanks for your rate :)<br />';

            $aResponse['server'] .= '<strong>Rate received :</strong> ' . $rate . '<br />';

            $aResponse['server'] .= '<strong>ID to update :</strong> ' . $id;

            // END ONLY FOR DEMO



            echo json_encode($aResponse);
        } else {

            $aResponse['error'] = true;

            $aResponse['message'] = 'An error occured during the request. Please retry';



            // ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER

            $aResponse['server'] = '<strong>ERROR :</strong> Your error if the request crash !';

            // END ONLY FOR DEMO





            echo json_encode($aResponse);
        }
    } else {

        $aResponse['error'] = true;

        $aResponse['message'] = '"action" post data not equal to \'rating\'';



        // ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER

        $aResponse['server'] = '<strong>ERROR :</strong> "action" post data not equal to \'rating\'';

        // END ONLY FOR DEMO





        echo json_encode($aResponse);
    }
} else {

    $aResponse['error'] = true;

    $aResponse['message'] = '$_POST[\'action\'] not found';



    // ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER

    $aResponse['server'] = '<strong>ERROR :</strong> $_POST[\'action\'] not found';

    // END ONLY FOR DEMO





    echo json_encode($aResponse);
}