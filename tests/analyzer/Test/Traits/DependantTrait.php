<?php

namespace Test\Traits;

use Test\Analyzer;

include_once dirname(__DIR__, 4).'/library/Autoload.php';
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class DependantTrait extends Analyzer {
    /* 8 methods */

    public function testTraits_DependantTrait01()  { $this->generic_test('Traits/DependantTrait.01'); }
    public function testTraits_DependantTrait02()  { $this->generic_test('Traits/DependantTrait.02'); }
    public function testTraits_DependantTrait03()  { $this->generic_test('Traits/DependantTrait.03'); }
    public function testTraits_DependantTrait04()  { $this->generic_test('Traits/DependantTrait.04'); }
    public function testTraits_DependantTrait05()  { $this->generic_test('Traits/DependantTrait.05'); }
    public function testTraits_DependantTrait06()  { $this->generic_test('Traits/DependantTrait.06'); }
    public function testTraits_DependantTrait07()  { $this->generic_test('Traits/DependantTrait.07'); }
    public function testTraits_DependantTrait08()  { $this->generic_test('Traits/DependantTrait.08'); }
}
?>