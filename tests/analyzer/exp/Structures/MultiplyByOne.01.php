<?php

$expected     = array('$a *= 1',
                      '$b /= 1',
                      '1 * 2',
                      '2 * 1',
                      '2 / 1',
                      '2 % 1',
                      '34 * 24 % 1',
                      '35 * 25 / 1',
                      '26 * 1',
                     );

$expected_not = array('$a *= -1',
                     );

?>