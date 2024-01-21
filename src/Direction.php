<?php

/**
 * JBZoo Toolbox - Mermaid-PHP.
 *
 * This file is part of the JBZoo Toolbox project.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @see        https://github.com/JBZoo/Mermaid-PHP
 */

declare(strict_types=1);

namespace JBZoo\MermaidPHP;

enum Direction: string
{
    case TOP_TO_BOTTOM = 'TB';
    case BOTTOM_TO_TOP = 'BT';
    case LEFT_TO_RIGHT = 'LR';
    case RIGHT_TO_LEFT = 'RL';
}