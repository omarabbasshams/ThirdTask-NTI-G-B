<?php 

function cleaninput( $inputs){
    
    $inputs['name']=filter_var(trim($inputs['name']),FILTER_SANITIZE_STRING);
    $inputs['email']=filter_var(trim($inputs['email']),FILTER_SANITIZE_EMAIL);
    $inputs['linkedin']=filter_var(trim($inputs['linkedin']),FILTER_SANITIZE_URL);
    return $inputs;
    
    
}
if($_SERVER["REQUEST_METHOD"] == 'POST'){
$clean = cleaninput($_POST);
$errorMessages = [];

    if(empty($clean['name'])){

        $errorMessages['Name'] = "Field Required";
    }


    if(empty($clean['email'])){

        $errorMessages['Email'] = "Field Required";
    }elseif(!filter_var($clean['email'], FILTER_VALIDATE_EMAIL)){
        $errorMessages['Email'] = "Field Not Valid";
    }


    if(strlen($clean['password']) < 6){

        $errorMessages['Password'] = "Length Must be > 5 ch";
    }

    if(strlen($clean['Address']) < 10){

        $errorMessages['Address'] = "Length Must be > 9 ch";
    }
    if(empty($clean['gender'])){

        $errorMessages['gender'] = "Field Required";
    }
    if(empty($clean['linkedin'])){

        $errorMessages['linkedin'] = "Field Required";
    }
    elseif(!filter_var($clean['linkedin'], FILTER_VALIDATE_URL)){
        $errorMessages['linkedin'] = "Field Not Valid";
    }
    if(count($errorMessages) > 0){
     

       foreach($errorMessages as $key => $value){

           echo '* '.$key.' : '.$value.'<br>';
       }


    }else{
    
        echo '<pre>';
        print_r($clean );
        echo '</pre>';
   
    }





  



  
}