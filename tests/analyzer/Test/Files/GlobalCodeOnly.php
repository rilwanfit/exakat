<?php

namespace Test\Files;

use Test\Analyzer;

include_once dirname(__DIR__, 4).'/library/Autoload.php';
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class GlobalCodeOnly extends Analyzer {
    /* 5 methods */

    public function testFiles_GlobalCodeOnly01()  { $this->generic_test('Files_GlobalCodeOnly.01'); }
    public function testFiles_GlobalCodeOnly02()  { $this->generic_test('Files/GlobalCodeOnly.02'); }
    public function testFiles_GlobalCodeOnly03()  { $this->generic_test('Files/GlobalCodeOnly.03'); }
    public function testFiles_GlobalCodeOnly04()  { $this->generic_test('Files/GlobalCodeOnly.04'); }
    public function testFiles_GlobalCodeOnly05()  { $this->generic_test('Files/GlobalCodeOnly.05'); }
}
?>