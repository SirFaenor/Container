<?php
/**
 * @author Emanuele Fornasier <work@emanuelefornasier.it>
 * @link http://www.atrio.it
 * @license MIT License
 * @version 2017-12-09
 */

namespace SirFaenor\Container\Exceptions;

/**
 * Contiene messaggio di errore interno
 * (passandola a Box\ErrorLogger causerà alert ad admin)
 * Lanciata da Box quando si richiama un componente non registrato
 */
class InvalidComponentException extends \Exception
{   

    public function __construct($componentName) {
        parent::__construct("Componente / Servizio non registrato : ".$componentName, E_RECOVERABLE_ERROR);
    }

}
