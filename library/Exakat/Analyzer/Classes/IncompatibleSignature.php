<?php
/*
 * Copyright 2012-2018 Damien Seguy – Exakat Ltd <contact(at)exakat.io>
 * This file is part of Exakat.
 *
 * Exakat is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Exakat is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Exakat.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The latest code can be found at <http://exakat.io/>.
 *
*/

namespace Exakat\Analyzer\Classes;

use Exakat\Analyzer\Analyzer;

class IncompatibleSignature extends Analyzer {
    public function analyze() {

        // non-matching reference
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->outIs('ARGUMENT')
             ->savePropertyAs('rank', 'rank')
             ->raw('sideEffect{ if (it.get().properties("reference").any()) { reference = it.get().value("reference");} else { reference = false; }}')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->outIs('ARGUMENT')
             ->samePropertyAs('rank', 'rank')
             ->raw('filter{ if (it.get().properties("reference").any()) { reference != it.get().value("reference");} else { reference != false; }}')
             ->back('first');
        $this->prepareQuery();

        // non-matching argument count
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->savePropertyAs('count', 'count')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->notSamePropertyAs('count', 'count')
             ->back('first');
        $this->prepareQuery();

        // non-matching typehint
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->outIs('ARGUMENT')
             ->savePropertyAs('rank', 'rank')
             ->raw('sideEffect{ if (it.get().vertices(OUT, "TYPEHINT").any()) { typehint = it.get().vertices(OUT, "TYPEHINT").next().value("fullnspath");} else { typehint = false; }}')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->outIs('ARGUMENT')
             ->samePropertyAs('rank', 'rank')
             ->raw('filter{ if (it.get().vertices(OUT, "TYPEHINT").any()) { typehint != it.get().vertices(OUT, "TYPEHINT").next().value("fullnspath");} else { typehint != false; }}')
             ->back('first');
        $this->prepareQuery();

        // non-matching return typehint
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->raw('sideEffect{ if (it.get().vertices(OUT, "RETURNTYPE").any()) { typehint = it.get().vertices(OUT, "RETURNTYPE").next().value("fullnspath");} else { typehint = false; }}')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->raw('filter{ if (it.get().vertices(OUT, "RETURNTYPE").any()) { typehint != it.get().vertices(OUT, "RETURNTYPE").next().value("fullnspath");} else { typehint != false; }}')
             ->back('first');
        $this->prepareQuery();

        // non-matching nullable
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->outIs('ARGUMENT')
             ->savePropertyAs('rank', 'rank')
             ->raw('sideEffect{ if (it.get().vertices(OUT, "NULLABLE").any()) { nullable = it.get().vertices(OUT, "NULLABLE").next().value("fullnspath");} else { nullable = false; }}')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->outIs('ARGUMENT')
             ->samePropertyAs('rank', 'rank')
             ->raw('filter{ if (it.get().vertices(OUT, "NULLABLE").any()) { nullable != it.get().vertices(OUT, "NULLABLE").next().value("fullnspath");} else { nullable != false; }}')
             ->back('first');
        $this->prepareQuery();

        // non-matching return nullable
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->raw('sideEffect{ if (it.get().vertices(OUT, "NULLABLE").any()) { nullable = it.get().vertices(OUT, "NULLABLE").next().value("fullnspath");} else { nullable = false; }}')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->raw('filter{ if (it.get().vertices(OUT, "NULLABLE").any()) { nullable != it.get().vertices(OUT, "NULLABLE").next().value("fullnspath");} else { nullable != false; }}')
             ->back('first');
        $this->prepareQuery();

        // non-matching visibility
        $this->atomIs('Method')
             ->outIs('NAME')
             ->savePropertyAs('code', 'name')
             ->inIs('NAME')
             ->raw('sideEffect{ if (it.get().properties("visibility").any()) { v = it.get().value("visibility");} else { v = false; }}')
             ->goToClass()
             ->hasOut('EXTENDS')
             ->goToAllParents()
             ->outIs('METHOD')
             ->outIs('NAME')
             ->samePropertyAs('code', 'name')
             ->inIs('NAME')
             ->raw(<<<GREMLIN
filter{ 
    if (it.get().properties("visibility").any()) { 
        if (v == "private") {
            it.get().value("visibility") in ["protected", "none", "public"];
        } else if (v == "protected") {
            it.get().value("visibility") in ["none", "public"];
        } else {
            false;
        }
    } else { 
        visibility != false; 
    }
}
GREMLIN
)
             ->back('first');
        $this->prepareQuery();
    }
}

?>