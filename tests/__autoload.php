<?php
spl_autoload_register (function($request) {
    
    // aggiungo namespace di Box nell'autoload
    $namespaceMap["SirFaenor\Container"] = realpath(__DIR__.'/../src/');
    $namespaceMap["SirFaenor\Container\Exceptions"] = realpath(__DIR__.'/../src/Exceptions');
    

    // divido in "cartelle"
    $dirNameRequired = explode("\\", $request);
    
    $className = array_pop($dirNameRequired);
    $dirName = implode("\\", $dirNameRequired);

    // directory di base, se mappata recupero il valore
    $base = '';
    if (array_key_exists($dirName, $namespaceMap)) :
       $base = $namespaceMap[$dirName];
    endif;


    $fileName =  $base . '/' . $className.'.php';
   
    // include la classe
    if (file_exists($fileName)) :
        require $fileName;

    endif;


});