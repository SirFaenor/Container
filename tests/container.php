<?php
require(__DIR__.'/__autoload.php');


function testRitornaSempreLaStessaIstanza() {
    
    $C = new \SirFaenor\Container\Container();

    /**
     * memorizza closure per futura creazione istanza
     * Richiamando test2 deve ritornare
     * sempre la stessa istanza.
     */
    $welcome = 'Ciao!!';
    $C->store("test", function() use($welcome) {

       // echo '<br>eseguo la closure';

        $object = new stdClass($container);

        $object->Title = $welcome;

        return $object;
       
    });


    $test1 = $C->test;
    $test2 = $C->test;

    // var_dump($test1);
    // var_dump($test2);

    if ($test1 === $test2) {
        echo '<br>testRitornaSempreLaStessaIstanza: OK';
    } else {
        echo '<br>testRitornaSempreLaStessaIstanza: FALLITO';
    }

}


function testNonAmmettoSovrascrittura() {

    $C = new \SirFaenor\Container\Container();
   
    $C->store("test", "posso memorizzare qualsiasi cosa");

    echo $C->test;

    try {
        $C->test = 'tento sovrascrittura';
    } catch (Exception $e) {
        echo '<br>testNonAmmettoSovrascrittura: OK';
        return;
    }

    echo '<br>testNonAmmettoSovrascrittura: FALLITO';

}


class Test {
    public function __construct($a, $b, $c) {
        var_dump($a);
        var_dump($b);
        var_dump($c);
    }
}

function testFactory() {

    $C = new \SirFaenor\Container\Container();
   

    $C->factory("test", function ($a, $b, $c) {

        return new Test($a, $b, $c);
    
    });

    $test1 = $C->create("test",1,2,3);
    $test2 = $C->create("test",4,5,6);
    
    if ($test1 !== $test2) {
        echo '<br>testFactory: OK';
    } else {
        echo '<br>testFactory: FALLITO';
    }

}



testRitornaSempreLaStessaIstanza();

testNonAmmettoSovrascrittura();

testFactory();




