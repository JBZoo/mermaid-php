<?php
/**
 * JBZoo MermaidPHP
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    MermaidPHP
 * @license    MIT
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @link       https://github.com/JBZoo/MermaidPHP
 */

namespace JBZoo\MermaidPHP;

/**
 * Class Graph
 * @package Item8\ZabbixSender\Mermaid
 */
class Graph
{
    public const TOP_BOTTOM = 'TB';
    public const BOTTOM_TOP = 'BT';
    public const LEFT_RIGHT = 'LR';
    public const RIGHT_LEFT = 'RL';

    /**
     * @var string
     */
    protected $direction = self::LEFT_RIGHT;

    /**
     * @var Node[]
     */
    protected $nodes = [];

    /**
     * @var Link[]
     */
    protected $links = [];

    /**
     * @var String[]
     */
    protected $styles = [];

    /**
     * @param string $direction
     */
    public function __construct($direction = self::LEFT_RIGHT)
    {
        $this->setDirection($direction);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $result = [
            "graph {$this->direction};"
        ];

        foreach ($this->nodes as $node) {
            $result[] = "    {$node}";
        }

        foreach ($this->links as $link) {
            $result[] = "    {$link}";
        }

        foreach ($this->styles as $style) {
            $result[] = $style;
        }

        return implode(PHP_EOL, $result);
    }

    /**
     * @param string $newDirection
     * @return $this
     */
    public function setDirection(string $newDirection): Graph
    {
        $this->direction = $newDirection;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param Node $node
     * @return $this
     */
    public function addNode(Node $node): Graph
    {
        $this->nodes[$node->getId()] = $node;
        return $this;
    }

    /**
     * @param Link $link
     * @return Graph
     */
    public function addLink(Link $link): Graph
    {
        $this->links[] = $link;
        return $this;
    }

    /**
     * @param string $style
     * @return Graph
     */
    public function addStyle(string $style): Graph
    {
        $this->styles[] = $style;
        return $this;
    }

    /**
     * @return string
     */
    public function renderHtml(): string
    {
        $scriptUrl = 'https://unpkg.com/mermaid@8.4.3/dist/mermaid.min.js';
        return implode(PHP_EOL, [
            '<!DOCTYPE html>',
            '<html lang="en">',
            '<head>',
            '    <meta charset="utf-8">',
            '</head>',
            '<body>',
            "    <div class=\"mermaid\">{$this}</div>",
            "    <script src=\"{$scriptUrl}\"></script>",
            '    <script>mermaid.initialize({startOnLoad:true});</script>',
            '</body>',
            '</html>',
        ]);
    }
}
