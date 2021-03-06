<?php

namespace Test\Files;

use Test\Analyzer;

include_once dirname(__DIR__, 4).'/library/Autoload.php';
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class MissingInclude extends Analyzer {
    /* 6 methods */

    public function testFiles_MissingInclude01()  { $this->generic_test('Files/MissingInclude.01'); }
    public function testFiles_MissingInclude02()  { $this->generic_test('Files/MissingInclude.02'); }
    public function testFiles_MissingInclude03()  { $this->generic_test('Files/MissingInclude.03'); }
    public function testFiles_MissingInclude04()  { $this->generic_test('Files/MissingInclude.04'); }
    public function testFiles_MissingInclude05()  { $this->generic_test('Files/MissingInclude.05'); }
    public function testFiles_MissingInclude06()  { $this->generic_test('Files/MissingInclude.06'); }
}
?>