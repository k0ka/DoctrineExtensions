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
 * Tree annotation for Tree behavioral extension
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("CLASS")
 *
 * @author Gediminas Morkevicius <gediminas.morkevicius@gmail.com>
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class Tree implements GedmoAnnotation
{
    /**
     * @var string
     * @phpstan-var 'closure'|'materializedPath'|'nested'
     */
    public $type = 'nested';

    /** @var bool */
    public $activateLocking = false;

    /**
     * @var int
     * @phpstan-var positive-int
     */
    public $lockingTimeout = 3;

    /**
     * @var string|null
     *
     * @deprecated to be removed in 4.0, unused, configure the property on the TreeRoot annotation instead
     */
    public $identifierMethod;

    /**
     * @phpstan-param class-string|null $type
     */
    public function __construct(
        array $data = [],
        ?string $type = null,
        bool $activateLocking = false,
        int $lockingTimeout = 3,
        ?string $identifierMethod = null
    ) {
        if ([] !== $data) {
            @trigger_error(sprintf(
                'Passing an array as first argument to "%s()" is deprecated. Use named arguments instead.',
                __METHOD__
            ), E_USER_DEPRECATED);
        }

        $this->type = $data['type'] ?? $type;
        $this->activateLocking = $data['activateLocking'] ?? $activateLocking;
        $this->lockingTimeout = $data['lockingTimeout'] ?? $lockingTimeout;
        $this->identifierMethod = $data['identifierMethod'] ?? $identifierMethod;
    }
}
