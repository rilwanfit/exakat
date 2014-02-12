<?php

namespace Test;

include_once(dirname(dirname(dirname(__DIR__))).'/library/Autoload.php');
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');

class Extensions_Extopenssl extends Analyzer {
    /* 1 methods */

    public function testExtensions_Extopenssl01()  { $this->generic_test('Extensions_Extopenssl.01'); }
}
?>