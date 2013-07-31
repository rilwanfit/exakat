<?php

namespace Tokenizer;

class Staticmethodcall extends TokenAuto {
    static public $operators = array('T_DOUBLE_COLON');

    function _check() {
        $operands = array('Constant', 'String', 'Variable', 'Array');

        $this->conditions = array( -1 => array('atom' => $operands), 
                                    0 => array('token' => Staticmethodcall::$operators),
                                    1 => array('atom' => 'Functioncall'),
                                 );
        
        $this->actions = array('makeEdge'   => array( -1 => 'CLASS',
                                                       1 => 'METHOD'),
                               'atom'       => 'Staticmethodcall');
        $this->checkAuto(); 

        return $this->checkRemaining();
    }
}

?>