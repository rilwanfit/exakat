<?php

namespace Analyzer\Structures;

use Analyzer;

class UselessInstruction extends Analyzer\Analyzer {
    
    public function analyze() {
        $this->atomIs("Sequence")
             ->outIs('ELEMENT')
             ->atomIs(array('Array', 'Addition', 'Multiplication', 'Property', 'Staticproperty', 'Boolean',
                            'Magicconstant', 'Staticconstant', 'Integer', 'Float', 'Sign', 'Nsname',
                            'Constant', 'String', 'Instanceof'));
        $this->prepareQuery();
    }
}

?>