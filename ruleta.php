<?php
//variables
$apuesta=0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $apuesta=$_POST['apuesta'];
    $parimp=$_POST['par'];
    $rb=$_POST['rb'];
    $senzilla=$_POST['senzilla'];
    $faltapasa=$_POST['faltapasa'];
    $cuadro = $_POST["cuadro"];
    $cuadro1 = $_POST["cuadro1"];
    $cuadro2 = $_POST["cuadro2"];
    $cuadro3 = $_POST["cuadro3"];
    $caballo = $_POST["caballo"];
    $caballo1 = $_POST["caballo1"];
    $columna = $_POST["columna"];
    $transversal = $_POST["transversal"];
    $tercio = $_POST["tercio"];
    $seis = $_POST["seis"];
    $seis1 = $_POST["seis1"];
    $seis2 = $_POST["seis2"];
    $seis3 = $_POST["seis3"];
    $seis4 = $_POST["seis4"];
    $seis5 = $_POST["seis5"];
    $numero= rand(0,36);
    //rojo negro
    $rojo = array(1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36);
    $negro = array(2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35);
    //Columnas
    $medio = array(2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35);
    $abajo = array(1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34);
    $arriba = array(3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36);
    //Filas
    $n = array(0, 1, 2);
    $n0 = array(0, 2, 3);
    $n1 = array(1, 2, 3);
    $n2 = array(4, 5, 6);
    $n3 = array(7, 8, 9);
    $n4 = array(10, 11, 12);
    $n5 = array(13, 14, 15);
    $n6 = array(16, 17, 18);
    $n7 = array(19, 20, 21);
    $n8 = array(22, 23, 24);
    $n9 = array(25, 26, 27);
    $n10 = array(28, 29, 30);
    $n11 = array(31, 32, 33);
    $n12 = array(34, 35, 36);
    echo "El numero es $numero<br>";
// Apuesta Senzilla
    if ($senzilla == $numero){
      $win=$apuesta * 35;
      echo "Has ganado $win en Senzilla<br>";
    }
//Apuesta Par o Impar
    if ($numero % 2 == 0 && $numero!=0 ){
      $parimpr = "Par";
    }
    elseif ($numero % 2 != 0 && $numero!=0 ){
      $parimpr = "Impar";
    }
    if ($parimpr==$parimp){
      $win=$apuesta * 2;
      echo "Has ganado $win en Par/Impar<br>";
    }
// Apuesta de Falta Pasa
    if ($numero >0 && $numero<19){
      $faltapasar = "Falta";
    }
    elseif ($numero >18 && $numero<=36){
      $faltapasar = "Pasa";
    }
    if ($faltapasar==$faltapasa){
      $win=$apuesta * 2;
      echo "Has ganado $win en Falta/Pasa<br>";
    }
  //Rojo Negro
    if ( in_array($numero,$rojo)){
      $rbr = "Rojo";
    }
    elseif (in_array($numero,$negro)) {
      $rbr = "Negro";
    }
    if ($rbr==$rb){
      $win=$apuesta * 2;
      echo "Has ganado $win en Rojo/Negro<br>";
    }
    //cuadro
    if ($cuadro != '' and $cuadro1 != '' and $cuadro2 != '' and $cuadro3 != '') {
        if ($cuadro == $numero or $cuadro1 == $numero or $cuadro2 == $numero or $cuadro3 == $numero) {
            $win=$apuesta * 8;
            echo "Has ganado $win en cuadro<br>";
        }
    }
    //caballo
    if ($caballo != '' and $caballo1 != '') {
    //comprobar
        if (in_array($caballo, $arriba)) {
            $comprueba = $caballo - 1;
            $comprueba1 = $caballo + 3;
            $comprueba2 = $caballo - 3;
            if ($caballo == 3) {
                if ($caballo1 != $comprueba1 and $caballo1 != $comprueba) {
                    echo "Solo numeros seguidos";
                    exit;
                }
            } elseif ($caballo == 36) {
                if ($caballo1 != $comprueba2 and $caballo1 != $comprueba) {
                    echo "Solo numeros seguidos";
                    exit;
                }
            } elseif ($caballo1 != $comprueba and $caballo1 != $comprueba1 and $caballo1 != $comprueba2) {
                echo "Solo numeros seguidos";
                exit;
            }
        }
        if (in_array($caballo, $abajo)) {
            $comprueba = $caballo + 1;
            $comprueba1 = $caballo + 3;
            $comprueba2 = $caballo - 3;
            if ($caballo == 1) {
                if ($caballo1 != $comprueba1 and $caballo1 != $comprueba) {
                    echo "Solo numeros seguidos";
                    exit;
                }
            } elseif ($caballo == 34) {
                if ($caballo1 != $comprueba2 and $caballo1 != $comprueba) {
                    echo "Solo numeros seguidos";
                    exit;
                }
            } elseif ($caballo1 != $comprueba and $caballo1 != $comprueba1 and $caballo1 != $comprueba2) {
                echo "Solo numeros seguidos";
                exit;
            }
        }
        if (in_array($caballo, $medio)) {
            $comprueba = $caballo + 1;
            $comprueba1 = $caballo + 3;
            $comprueba2 = $caballo - 3;
            $comprueba3 = $caballo - 1;
            if ($caballo == 2) {
                if ($caballo1 != $comprueba1 and $caballo1 != $comprueba and $caballo1 != $comprueba3) {
                    echo "Solo numeros seguidos";
                    exit;
                }
            } elseif ($caballo == 35) {
                if ($caballo1 != $comprueba2 and $caballo1 != $comprueba and $caballo1 != $comprueba3) {
                    echo "Solo numeros seguidos";
                    exit;
                }
            } elseif ($caballo1 != $comprueba and $caballo1 != $comprueba1 and $caballo1 != $comprueba2) {
                echo "Solo numeros seguidos";
                exit;
            }
        }
        if ($caballo == $numero or $caballo1 == $numero) {
            $win=$apuesta * 17;
            echo "Has ganado $win en caballo<br>";
        }
    }
    //columna
    if ($columna != "Nada") {
        if ($columna == "Superior") {
            if (in_array($numero, $arriba)) {
                $win = $apuesta * 2;
                echo "Has ganado $win en columna<br>";
            }
        }
        if ($columna == "Medio") {
            if (in_array($numero, $medio)) {
                $win = $apuesta * 2;
                echo "Has ganado $win en columna<br>";
            }
        }
        if ($columna == "Inferior") {
            if (in_array($numero, $abajo)) {
                $win = $apuesta * 2;
                echo "Has ganado $win en columna<br>";
            }
        }
      }
      //transversales
      if ($transversal != "Nada") {
          if ($transversal == "0/1/2") {
              if (in_array($numero, $n)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "0/2/3") {
              if (in_array($numero, $n0)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "1/2/3") {
              if (in_array($numero, $n1)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "4/5/6") {
              if (in_array($numero, $n2)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "7/8/9") {
              if (in_array($numero, $n3)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "10/11/12") {
              if (in_array($numero, $n4)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "13/14/15") {
              if (in_array($numero, $n5)) {
                  $win = $apuesta * 11;
                echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "16/17/18") {
              if (in_array($numero, $n6)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          if (($transversal == "19/20/21")) {
              if (in_array($numero, $n7)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "22/23/24") {
              if (in_array($numero, $n8)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "25/26/27") {
              if (in_array($numero, $n9)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "28/29/30") {
              if (in_array($numero, $n10)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "31/32/33") {
              if (in_array($numero, $n11)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
          if ($transversal == "34/35/36") {
              if (in_array($numero, $n12)) {
                  $win = $apuesta * 11;
                  echo "Has ganado $win en transversal<br>";
              }
          }
      }
}
    //seis
    if ($seis != '' and $seis1 != '' and $seis2 != '' and $seis3 != '' and $seis4 != '' and $seis5 != '') {
        if ($seis == $numero or $seis1 == $numero or $seis2 == $numero or $seis3 == $numero or $seis4 == $numero or $seis5 == $numero) {
            $win = $apuesta * 5;
            echo "Has ganado $win en seis<br>";
        }
    }
    //tercio
    if ($tercio != "Nada") {
        if ($tercio == "1/12") {
            if ($numero <= 12 and $numero >= 1) {
                $win = $apuesta * 2;
                echo "Has ganado $win en tercio<br>";
            }
        } elseif ($tercio == "13/24") {
            if ($numero <= 24 and $numero >= 13) {
                $win = $apuesta * 2;
                echo "Has ganado $win en tercio<br>";
            }
        } elseif ($tercio == "25/36") {
            if ($numero <= 36 and $numero >= 25) {
                $win = $apuesta * 2;
              echo "Has ganado $win en tercio<br>";
            }
        }
        }
}
?>
<html>
  <form action="#" method="post">
  <p>Senzilla: <input name="senzilla" type="string" /></p>
  <p>Apuesta: <input name="apuesta" type="number" /></p>
  <p>Par/Impar: <select name="par">
                <option>Nada</option>
                <option>Par</option>
                <option>Impar</option>
                </select>
  </p>
  <p>Rojo/Negro: <select name="rb">
                <option>Nada</option>
                <option>Rojo</option>
                <option>Negro</option>
                </select>
  </p>
  <p>Falta/Pasa: <select name="faltapasa">
                <option>Nada</option>
                <option>Falta</option>
                <option>Pasa</option>
                </select>
  </p>
  <p>Columna: <select name="columna">
               <option>Nada</option>
               <option>Inferior </option>
               <option>Medio</option>
               <option>Superior</option>
               </select>
  </p>
  <p>Transversal: <select name="transversal">
               <option>Nada</option>
               <option>0/1/2 </option>
               <option>0/2/3 </option>
               <option>1/2/3 </option>
               <option>4/5/6</option>
               <option>7/8/9</option>
               <option>10/11/12</option>
               <option>13/14/15</option>
               <option>16/17/18</option>
               <option>19/20/21</option>
               <option>22/23/24</option>
               <option>25/26/27</option>
               <option>28/29/30</option>
               <option>31/32/33</option>
               <option>34/35/36</option>
               </select>
   </p>
   <p>Tercio:  <select name="tercio">
               <option>Nada</option>
               <option>1/12</option>
               <option>13/24</option>
               <option>25/36</option>
               </select>
    </p>
    <p>Caballo:
       <input type="number" name="caballo" min="0" max="36">
       <input type="number" name="caballo1" min="0" max="36" >
    </p>
    <p>Cuadro:
       <input type="number" name="cuadro" min="0" max="36" >
       <input type="number" name="cuadro1" min="0" max="36" >
       <input type="number" name="cuadro2" min="0" max="36" >
       <input type="number" name="cuadro3" min="0" max="36" >
    </p>
    <p>Seis:
            <input type="number" name="seis" min="0" max="36" >
            <input type="number" name="seis1" min="0" max="36" >
            <input type="number" name="seis2" min="0" max="36" >
            <input type="number" name="seis3" min="0" max="36" >
            <input type="number" name="seis4" min="0" max="36" >
            <input type="number" name="seis5" min="0" max="36" >
         </p>

  <p><input type="submit" value="Enviar"></p>
  <img src="imgruleta.png"></img>
</form>
</html>
