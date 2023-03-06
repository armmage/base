<?php
/**
 * @package Base
 *
 * @author Gevorg Arshakyan <gevorg@armmage.com>
 *
 * @copyright Copyright (c) 2023 ArmMage (https://armmage.com)
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'ArmMage_Base',
    __DIR__
);
