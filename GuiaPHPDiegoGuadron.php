<?php
//Ejercicio 1
function generarFibonacci($n) {
    // Inicializamos el array con los primeros dos números de la serie
    $serie = array();
    
    if ($n >= 1) {
        $serie[] = 0;
    }
    if ($n >= 2) {
        $serie[] = 1;
    }
    
    for ($i = 2; $i < $n; $i++) {
        $serie[] = $serie[$i - 1] + $serie[$i - 2];
    }
    
    return $serie;
}

$terminos = 5;
$resultado = generarFibonacci($terminos);

echo "Los primeros $terminos términos de la serie Fibonacci son:\n";
echo implode(", ", $resultado);



//Ejerciocio 2
function esPrimo($numero) {
    if ($numero <= 1) return false;
    if ($numero == 2) return true;
    if ($numero % 2 == 0) return false;
    
    for ($i = 3; $i * $i <= $numero; $i += 2) {
        if ($numero % $i == 0) return false;
    }
    
    return true;
}

$numero = 1;
echo "<br>"."El número  $numero " . (esPrimo($numero) ? "es primo" : "no es primo") . "<br>";


//Ejercicio 3
function esPalindromo($texto) {
    $textoLimpio = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($texto));
    
    return $textoLimpio === strrev($textoLimpio);
}

$palabra = "tralalero tralala";
$resultado = esPalindromo($palabra) ? "SÍ" : "NO";

echo "¿'$palabra' es un palíndromo? $resultado";


//Ejercicio 4
function sumarPares($numeros) {
    $suma = 0;
    foreach ($numeros as $numero) {
        if ($numero % 2 == 0) {  // Verifica si el número es par
            $suma += $numero;
        }
    }
    return $suma;
}

// Ejemplo de uso:
$miArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$resultado = sumarPares($miArray);

echo "<br>"."La suma de los números pares es: " . $resultado;


//Ejercicio 5
function calcularCostoLlamada($claveZona, $minutos) {
    $preciosZonas = [
        12 => 2.00,  
        15 => 2.20,   
        18 => 4.50,   
        19 => 3.50,   
        23 => 6.00,   
        25 => 6.00,   
        29 => 5.00    
    ];

    if (!array_key_exists($claveZona, $preciosZonas)) {
        return "Error: Clave de zona no válida";
    }

    $precioMinuto = $preciosZonas[$claveZona];
    
    $costo = $minutos * $precioMinuto;
    
    if ($minutos < 30) {
        $costo *= 0.90; 
    }
    
    return $costo;
}

function obtenerNombreZona($claveZona) {
    $zonas = [
        12 => "América del Norte",
        15 => "América Central",
        18 => "América del Sur",
        19 => "Europa",
        23 => "Asia",
        25 => "África",
        29 => "Oceanía"
    ];
    return $zonas[$claveZona] ?? "Zona desconocida";
}

$clave = 25; 
$minutos = 45; 

$costo = calcularCostoLlamada($clave, $minutos);
$nombreZona = obtenerNombreZona($clave);

if (is_numeric($costo)) {
    echo "<br>";
    echo "Llamada a $nombreZona (Clave: $clave)\n";
    echo "Duración: $minutos minutos\n";
    echo "Costo total: $" . number_format($costo, 2) . "\n";
    
    if ($minutos < 30) {
        echo "(Se aplicó descuento del 10% por llamada menor a 30 minutos)\n";
    }
} else {
    echo $costo;
}


//Ejercicio 6
function fizzBuzz($n) {
    $answer = array();
    
    for ($i = 1; $i <= $n; $i++) {
        $output = '';
        
        if ($i % 3 == 0) $output .= 'Fizz';
        if ($i % 5 == 0) $output .= 'Buzz';
        
        $answer[] = empty($output) ? strval($i) : $output;
    }
    
    return $answer;
}

function mostrarFizzBuzz($n) {
    $resultado = fizzBuzz($n);
    echo "<br>";
    echo "Input: n = $n\n";
    echo "Output: [" . implode(", ", $resultado) . "]\n";
}


mostrarFizzBuzz(5);
?>