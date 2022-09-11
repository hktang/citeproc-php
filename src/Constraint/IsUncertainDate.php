<?php
declare(strict_types=1);
/*
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Constraint;

use stdClass;

class IsUncertainDate extends AbstractConstraint
{

    /**
     * @param string $variable
     * @param stdClass $data ;
     * @return bool
     */
    protected function matchForVariable(string $variable, stdClass $data): bool
    {
        if (!empty($data->{$variable})) {
            if (isset($data->{$variable}->{'circa'})) {
                return true;
            }
        }
        return false;
    }
}
