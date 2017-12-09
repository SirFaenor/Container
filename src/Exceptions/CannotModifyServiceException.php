<?php
/**
 * @author Emanuele Fornasier <work@emanuelefornasier.it>
 * @link http://www.atrio.it
 * @license MIT License
 * @version 2017-12-09
 */

namespace SirFaenor\Container\Exceptions;


/**
 * Servizio non modificabile
 */
class CannotModifyServiceException extends \Exception
{

    public function __construct($name) {
        parent::__construct("Cannot modify a service : ".$name, E_RECOVERABLE_ERROR);
    }

}
