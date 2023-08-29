<?php
    $n = $_GET['n'];
    $a = $_GET['a'];

    if(isset($_GET['txtFieldB']))
    {
        $b = $_GET['txtFieldB'];
    }

    
    function ggT($a, $n)
    {
        if($n==1)
        {
            return true;
        }
        else if($n==0)
        {
            return false;
        }
        //funktion um den ggT zu berechnen
        return ggT($n, $n % $a);
    }

    function inv($a, $n)
    {
        //die Funktion soll brute force ausprobieren, welche Zahl das multiplikative Inverse von a ist.
        if(ggT($a, $n)) //wird ausgefuehrt insofern es ein Inverses gibt
        {
            //algorithmus zur Brute-Force Berechnung der Inversen
            for($i=1; $i <= $n; $i++)
            {
                if((($i * $a) % $n) == 1)
                {
                    return $i;
                }
            }
            //echo "Es gibt kein Inverses!";
        }
        else
        {
            return false;
        }
    }

    function div($a, $b, $n)
    {
        if(inv($a, $n)) //wenn es ein Inverses gibt, wird die Funktion ausgefuehrt
        {
            return (($a * inv($b, $n)) % $n);
        }
        else
        {
            return false;
        }
    }

    function mult($a, $b, $n)
    {
        return (($a * $b) % $n);
    }

    function add($a, $b, $n)
    {
        return (($a + $b) % $n);
    }

    function sub($a, $b, $n)
    {
        return (($a - $b) % $n);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$a mod $n";?></title>
    <link rel="stylesheet" href="ggtJS.css">
</head>
<body>
   <?php
    echo"<h1>Das Inverse von $a mod $n ist: ";
    if(!inv($a, $n))
        echo "Es gibt kein Inverses!" . "<br />";
    else
        echo inv($a, $n) . "<br />";

   if(isset($_GET['Addition']))
   {
    echo "<h1>$a + $b mod $n = "; echo add($a, $b, $n); echo "<br />";
   }
   if(isset($_GET['Subtraktion'])){
    echo "$a - $b mod $n = "; echo sub($a, $b, $n); echo "<br />";
   }
   if(isset($_GET['Multiplikation']))
   {
    echo "$a * $b mod $n = "; echo mult($a, $b, $n); echo "<br />";
   }
   if(isset($_GET['Division']))
   {
    echo "$a / $b mod $n = ";
        if(div($a, $b, $n))
            echo div($a, $b, $n);
        else
            echo "Division nicht moeglich!";
   }
   echo "</h1>";
   ?>
</body>
</html>     