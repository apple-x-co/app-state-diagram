<?php

declare(strict_types=1);

namespace Koriym\AppStateDiagram;

use Koriym\AppStateDiagram\Exception\InvalidSemanticsException;

final class SemanticDescriptor implements DescriptorInterface
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var null|object
     */
    public $descriptor;

    /**
     * @var null|string
     */
    public $def;

    /**
     * @var string
     */
    public $doc;

    public function __construct(object $descriptor)
    {
        if (! isset($descriptor->type, $descriptor->id) || $descriptor->type !== 'semantic') {
            throw new InvalidSemanticsException((string) json_encode($descriptor));
        }
        $this->id = $descriptor->id;
        $this->descriptor = isset($descriptor->descriptor) ? $descriptor->descriptor : null;
        $this->def = isset($descriptor->def) ? $descriptor->def : null;
        $this->doc = isset($descriptor->doc) ? $descriptor->doc : '';
    }
}
