<?php

namespace ThBM\DateTextTypeBundle\Form\DataTransformer;


use DateParser\DateParser;
use Symfony\Component\Form\DataTransformerInterface;

class DateStringParserTransform implements DataTransformerInterface
{
    public function transform($value)
    {
        if($value instanceof \DateTimeInterface) {
            return $value->format("d/m/Y");
        }
        return null;
    }

    public function reverseTransform($value)
    {
        return DateParser::parseFromFrString($value);
    }
}