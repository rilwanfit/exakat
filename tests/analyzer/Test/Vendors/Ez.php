<?php

namespace Test\Vendors;

use Test\Analyzer;

include_once dirname(__DIR__, 4).'/library/Autoload.php';
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class Ez extends Analyzer {
    /* 1 methods */

    public function testVendors_Ez01()  { $this->generic_test('Vendors/Ez.01'); }
}
?>