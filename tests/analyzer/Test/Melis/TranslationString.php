<?php

namespace Test\Melis;

use Test\Analyzer;

include_once dirname(__DIR__, 4).'/library/Autoload.php';
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class TranslationString extends Analyzer {
    /* 1 methods */

    public function testMelis_TranslationString01()  { $this->generic_test('Melis/TranslationString.01'); }
}
?>