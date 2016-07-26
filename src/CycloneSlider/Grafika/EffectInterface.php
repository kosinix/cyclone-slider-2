<?php
namespace CycloneSlider\Grafika;

/**
 * Interface EffectInterface
 * @package Grafika
 */
interface EffectInterface {

    /**
     * @param ImageInterface $image
     *
     * @return ImageInterface
     */
    public function apply( $image );

}