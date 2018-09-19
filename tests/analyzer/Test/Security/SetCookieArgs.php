<?php

namespace Test\Security;

use Test\Analyzer;

include_once dirname(__DIR__, 4).'/library/Autoload.php';
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class SetCookieArgs extends Analyzer {
    /* 1 methods */

    public function testSecurity_SetCookieArgs01()  { $this->generic_test('Security/SetCookieArgs.01'); }
}
?>