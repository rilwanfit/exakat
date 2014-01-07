<?php

namespace Analyzer\Variables;

use Analyzer;

class VariableUsedOnce extends Analyzer\Analyzer {
    
    function dependsOn() {
        return array('Analyzer\\Variables\\Blind',
                     'Analyzer\\Variables\\InterfaceArguments',
                     'Analyzer\\Variables\\Variablenames'
                     );
    }
    
    function analyze() {
        $this->atomIs("Variable")
             ->analyzerIs('Analyzer\\Variables\\Variablenames')
             ->analyzerIsNot("Analyzer\\Variables\\Blind")
             ->analyzerIsNot("Analyzer\\Variables\\InterfaceArguments")
             ->noCode(VariablePhp::$variables, true)
             ->eachCounted('fullcode', 1)
             ;
    }
}

?>