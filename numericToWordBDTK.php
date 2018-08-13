<?php
function convertNumberToWordBDTTk($number){//function initialization
    $words = array(
    '0'=> '' ,
	'1'=> 'One' ,
	'2'=> 'Two' ,
	'3' => 'Three',
	'4' => 'Four',
	'5' => 'Five',
    '6' => 'Six',
	'7' => 'Seven',
	'8' => 'Eight',
	'9' => 'Nine',
	'10' => 'Ten',
    '11' => 'Eleven',
	'12' => 'Twelve',
	'13' => 'Thirteen',
	'14' => 'Fouteen',
	'15' => 'Fifteen',
    '16' => 'Sixteen',
	'17' => 'Seventeen',
	'18' => 'Eighteen',
	'19' => 'Nineteen',
	'20' => 'Twenty',
    '30' => 'Thirty',
	'40' => 'Fourty',
	'50' => 'Fifty',
	'60' => 'Sixty',
	'70' => 'Seventy',
    '80' => 'Eighty',
	'90' => 'Ninty');
    
    //Finding the length of given number
    $number_length = strlen($number);
    //Empty array initializing
    $NUM_Array = array(0,0,0,0,0,0,0,0,0);        
    $Received_Num_Array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
  		$Received_Num_Array[$i] = substr($number,$i,1);    
  	}
    //filling the empty arry with received data
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $NUM_Array[$i] = $Received_Num_Array[$j]; 
    }
    $afterConvert = "";
    //dividing to identify ten's part of number
    for($i=0,$j=1;$i<9;$i++,$j++){
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($NUM_Array[$j]==0 || $NUM_Array[$i] == "1"){
                $NUM_Array[$j] = intval($NUM_Array[$i])*10+$NUM_Array[$j];
                $NUM_Array[$i] = 0;
            }
               
        }
    }
    $VAL = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $VAL = $NUM_Array[$i]*10; 
        }
        else{ 
            $VAL = $NUM_Array[$i];    
        }            
        if($VAL!=0)         {    $afterConvert.= $words["$VAL"]." "; }
        if($i==1 && $VAL!=0){    $afterConvert.= "Crores "; }
        if($i==3 && $VAL!=0){    $afterConvert.= "Lakhs ";    }
        if($i==5 && $VAL!=0){    $afterConvert.= "Thousand "; }
        if($i==6 && $VAL!=0){    $afterConvert.= "Hundred &amp; "; }            
    }
    if($number_length>9){ $afterConvert = "Sorry This does not support more than 99 Crores"; }
    return ucwords(("( ".$afterConvert)." Tk Only.)");
}

  echo "\n========= 45671 ========";
  $checkdigit="45671";
  echo convertNumberToWordBDTTk($checkdigit);

    
?>