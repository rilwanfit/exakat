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

namespace Exakat\Reports;

use Exakat\Analyzer\Analyzer;
use Exakat\Reports\Helpers\Results;

class Codacy extends Reports {
    const FILE_EXTENSION = 'json';
    const FILE_FILENAME  = 'stdout';

    public function _generate($analyzerList) {
        $analysisResults = new Results($this->sqlite, $analyzerList);
        $analysisResults->load();

        $results = array();
        $titleCache = array();
        foreach($analysisResults->toArray() as $row) {
            if (!isset($titleCache[$row['analyzer']])) {
                $analyzer = $this->themes->getInstance($row['analyzer'], null, $this->config);
                $titleCache[$row['analyzer']] = $analyzer->getDescription()->getName();
            }

            /*
https://support.codacy.com/hc/en-us/articles/207994725-Tool-Developer-Guide
{
  "filename":"codacy/core/test.js",
  "message":"found this in your code",
  "patternId":"latedef",
  "line":2
}            */
            $line = array('file'      => trim($row['file'], '/'), // no initial / for the path
                          'message'   => $titleCache[$row['analyzer']],
                          'patternId' => $row['analyzer'],
                          'line'      => $row['line'],
                          );
            
            $results[] = json_encode($line);
        }

        return implode(PHP_EOL, $results);
    }
}

?>