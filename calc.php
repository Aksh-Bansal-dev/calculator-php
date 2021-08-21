<?php
$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$op = $_POST["operator"];


if(strlen($num1)>9 || strlen($num2)>9){
    error("Integer overflow");
}

$num1 = (double)($num1);
$num2 = (double)($num2);

try {
    switch ($op) {
        case 'add':
            $res = $num1+$num2;
            ret($res, $num1, $num2, "%2B");
            break;
        
        case 'sub':
            $res = $num1-$num2;
            ret($res, $num1, $num2, "-");
            break;
        
        case 'mul':
            $res = $num1*$num2;
            ret($res, $num1, $num2, "*");
            break;
        
        case 'div':
            if($num2==0){
                error("Division by 0");
            }
            $res = $num1/$num2;
            ret($res, $num1, $num2, "%2F");
            break;
        
        case 'sqrt':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            else if($num2<=0){
                error("Number must be strictly greater than 0");
            }
            $res = sqrt($num2);
            ret($res, $num1, $num2, "%E2%88%9A");
            break;
        
        case 'pow':
            $res = pow($num1,$num2);
            ret($res, $num1, $num2, "%5E");
            break;
        
        case 'fact':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = 1;
            for($i=2;$i<=$num2;$i++){
                $res *= $i;
            }
            ret($res, $num1, $num2, "!");
            break;
        
        case 'xor':
            $res = $num1^$num2;
            ret($res, $num1, $num2, "XOR");
            break;
        
        case 'or':
            $res = $num1|$num2;
            ret($res, $num1, $num2, "OR");
            break;
        
        case 'and':
            $res = $num1&$num2;
            ret($res, $num1, $num2, 'AND');
            break;
        
        case 'exp':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = exp($num2);
            ret($res, $num1, $num2, "e%5E");
            break;
        
        case 'sq':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = $num2*$num2;
            ret($res, $num1, $num2, "square");
            break;
        
        case 'log':
            if($num1==1 || $num1<=0){
                error("base must not be equal to 1 or less than or equal to 0");
            }
            if($num2<=0){
                error("Number must not be less than or equal to 0");
            }
            $res = log($num2,$num1);
            ret($res, $num1, $num2, "log");
            break;
        
        case 'sin':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = sin($num2);
            ret($res, $num1, $num2, "sin");
            break;
        
        case 'cos':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = cos($num2);
            ret($res, $num1, $num2, "cos");
            break;
        
        case 'tan':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = tan($num2);
            ret($res, $num1, $num2, "tan");
            break;

        case 'arcsin':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = asin($num2);
            ret($res, $num1, $num2, "arcsin");
            break;
        
        case 'arccos':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = acos($num2);
            ret($res, $num1, $num2, "acos");
            break;
        
        case 'arctan':
            if($num1!=0){
                error("1st number must be '0' for this operation");
            }
            $res = atan($num2);
            ret($res, $num1, $num2, "atan");
            break;
        default:
            error("Invalid argument");
            break;
}
} catch (\Throwable $th) {
    error("Invalid input");
}


function ret($res, $num1, $num2, $op){
    if($num1=="0" && $op!="*"  && $op!="%5E"&& $op!="%2F"){
        $num1 = "";
    }
    else if($op=="log"){
        $op =  "log%3Csub%3E$num1%3C%2Fsub%3E";
        $num1 = "";
    }
    else{
        $num1 = "(".$num1.")";
    }

    header("Location: /index.php?res=$res&equation=${num1}${op}(${num2})");
    exit();
}
function error($err){
    header("Location: /index.php?err=$err");
    exit();
}
