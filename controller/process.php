<?php 
session_start();
require_once '../web-config/config.php';
require_once '../web-config/database.php';
    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: index.php');
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK_TEST-6b861d848eb4096583f7b8cde766e1d6-X"
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
              
              $res = json_decode($response);
              if($res->status)
              {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                if($amountPaid >= $amountToPay)
                {
                    $ans = $database->create("payment", $fields = ["type"=>"Momo Pay", "amount"=>$amountPaid]);
                    $pay_id = $database->inset_id();
                    $database->update("application", "id = '".$_SESSION['appId']."'", $fields = ["application_code"=>$pay_id]);
                     echo "<script type='text/javascript'>document.location.href='http://localhost:8080/rda-monitor/view/payment';</script>";
                    //* Continue to give item to the user
                    //include("../view/payment.php");
                }
                else
                {
                    echo 'Fraud transactio detected';
                }
              }
              else
              {
                  echo 'Can not process payment';
              }
        }
    }
?>