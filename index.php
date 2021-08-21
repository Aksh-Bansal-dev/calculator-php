<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="calc.php" method="post" class="main" autocomplete="off">
        <div class="all">
        <input type="number" name="num1" class="display" value="0" step="0.000001" required/>
        <select name="operator" class="display oper">
          <option  value="add">+</option>
          <option value="sub">-</option>
          <option value="mul">*</option>
          <option value="div">/</option>
          <option value="sqrt">√</option>
          <option value="fact">!</option>
          <option value="xor">XOR</option>
          <option value="and">AND</option>
          <option value="or">OR</option>
          <option value="pow">^</option>
          <option value="sq">x^2</option>
          <option value="exp">e^x</option>
          <option value="log">log</option>
          <option value="sin">sin</option>
          <option value="cos">cos</option>
          <option value="tan">tan</option>
          <option value="arcsin">Arcsin</option>
          <option value="arccos">Arccos</option>
          <option value="arctan">Arctan</option>
        </select>
        <input type="number" name="num2" class="display" value="0" step="0.000001" required/>
        </div>
        <input type="submit" style="display: none" />
        <?php
            $res = $_GET["res"];
            $equation = $_GET["equation"];
            $err = $_GET["err"];
            if($err!=""){
                echo "<strong class='result error'>ERROR: $err</strong>";
            }
            else if($res!=""){
                echo "<strong class='result'>$equation = $res</strong>";
            }
        ?>
    </form>
</body>
</html>