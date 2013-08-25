<?php

namespace Tokenizer;

class Shell extends TokenAuto {
    static public $operators = array('T_SHELL_QUOTE');

    function _check() {
// Case of string with interpolation : `a${b}c`;
        $this->conditions = array(  0 => array('token' => Shell::$operators, 
                                               'atom' => 'none'),
                                    1 => array('atom'  => array('String', 'Variable', 'Concatenation', 'Array')),
                                 );
        
        $this->actions = array( 'make_quoted_string' => 'Shell');
        $this->checkAuto();

        return $this->checkRemaining();
    }
}

?>