<?php

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\Mapping\Annotation;

use Attribute;
use Doctrine\Common\Annotations\Annotation;
use Gedmo\Mapping\Annotation\Annotation as GedmoAnnotation;

/**
 * ReferenceIntegrity annotation for ReferenceIntegrity behavioral extension
 *
 * @Annotation
 * @Target("PROPERTY")
 *
 * @author Evert Harmeling <evert.harmeling@freshheads.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class ReferenceIntegrity implements GedmoAnnotation
{
    /** @var string|null */
    public $value;

    public function __construct(array $data = [], $value = null)
    {
        if ([] !== $data) {
            @trigger_error(sprintf(
                'Passing an array as first argument to "%s()" is deprecated. Use named arguments instead.',
                __METHOD__
            ), E_USER_DEPRECATED);
        }

        $this->value = $data['value'] ?? $value;
    }
}
