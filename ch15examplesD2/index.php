<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include 'Naming_function.php';
        seperator('TRY CATCH, use for project 5');
        function calculate_future_value(
               $investment, $interest_rate, $years) { //check conditions
            if  ($investment <= 0 || 
                 $interest_rate <= 0 || 
                 $years <= 0 ) {
              throw new Exception("Please check all entries."); //if any fail throw exception
            }       //else

            $future_value = $investment;
            for ($i = 1; $i <= $years; $i++) {
                $future_value = 
                    ($future_value + 
                        ($future_value * $interest_rate * .01)); //calculate
            }
            return round($future_value, 2); //round out to 2 decimals and return.
        }
       
                try { //attempt to send (10000, 0.06, 0) to calculate_future_value; 
            $fv =  calculate_future_value(10000, 0.06, 0); 
            echo 'Future value was calculated successfully.'; //if successful send
        } catch (Exception $e) { //if fail
            echo 'Error: ' . $e->getMessage(); //send 'Error' and trigger Exception above
        }

        
        seperator();
        
        class customException extends Exception {   //re-throw example
              public function errorMessage() {
                //error message
                $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
                return $errorMsg;
              }
            }

            $email = "someone@example.com";

            try {
            //  try {          //run as-is then uncomment inner try & braces to compare
                //check for "example" in mail address
                if(strpos($email, "example") !== FALSE) {
                  //throw exception if email is not valid
                  throw new Exception($email);
                }
            //  }
            //  catch(Exception $e) {
            //    //re-throw exception
            //    throw new customException($email);
            //  }
            }

            catch (customException $e) {
              //display custom message
              echo $e->errorMessage();
              //exit;                       //skips processing below if used
            }
            
            seperator();
            echo "</br>";
                    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
                    try {           
                        $db = 
                            new PDO($dsn, 'root', 'Pa$$word');
                       // other statements
                    } catch (PDOException $e) {
                       echo 'PDOException: ' . $e->getMessage();
                   } catch (Exception $e) {
                        echo 'Exception: ' . $e->getMessage();
                    }

        
        
        
        ?>
        
 
    </body>
</html>
