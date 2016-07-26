<?php
namespace CycloneSlider\Grafika\DrawingObject;

use CycloneSlider\Grafika\Color;

/**
 * Base class
 * @package Grafika
 */
abstract class Ellipse
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
     * X,Y pos.
     * @var array
     */
    protected $pos;

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
     * Ellipse constructor.
     *
     * @param int $width Width of ellipse in pixels.
     * @param int $height Height of ellipse in pixels.
     * @param array $pos Array containing int X and int Y position from top left of canvass.
     * @param int $borderSize Border thickness in pixels.
     * @param Color|null $borderColor Border color.
     * @param Color|null $fillColor Border color.
     */
    public function __construct($width, $height, $pos, $borderSize, $borderColor, $fillColor) {
        $this->width = $width;
        $this->height = $height;
        $this->pos = $pos;
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
    public function getPos()
    {
        return $this->pos;
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