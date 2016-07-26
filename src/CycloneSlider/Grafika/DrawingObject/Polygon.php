<?php
namespace CycloneSlider\Grafika\DrawingObject;

use CycloneSlider\Grafika\Color;

/**
 * Base class
 * @package Grafika
 */
abstract class Polygon
{
    /**
     * Image width in pixels
     * @var int
     */
    protected $width;

    /**
     * Image height in pixels
     * @var int
     */
    protected $height;

    /**
     * Array of all X and Y positions. Must have at least three positions (x,y).
     * @var array
     */
    protected $points;

    /**
     * @var int
     */
    protected $borderSize;

    /**
     * @var Color
     */
    protected $fillColor;

    /**
     * @var Color
     */
    protected $borderColor;

    /**
     * Creates a polygon.
     * @param array $points Array of all X and Y positions. Must have at least three positions.
     * @param int $borderSize Size of the border in pixels. Defaults to 0 or no border.
     * @param Color $borderColor Border color. Defaults to black.
     * @param Color $fillColor Fill color. Defaults to none (null).
     */
    public function __construct($points = array(array(0,0), array(0,0), array(0,0)), $borderSize, $borderColor, $fillColor) {
        $this->points = $points;
        $this->borderSize = $borderSize;
        $this->borderColor = $borderColor;
        $this->fillColor = $fillColor;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return array
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return int
     */
    public function getBorderSize()
    {
        return $this->borderSize;
    }

    /**
     * @return Color
     */
    public function getFillColor()
    {
        return $this->fillColor;
    }

    /**
     * @return Color
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }


}