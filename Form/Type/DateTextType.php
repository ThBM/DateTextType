<?php

namespace ThBM\DateTextTypeBundle\Form\Type;


use ThBM\DateTextTypeBundle\Form\DataTransformer\DateStringParserTransform;
use DateParser\DateParser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateTextType extends AbstractType
{
    /**
     * @var DateStringParserTransform
     */
    private $transform;
    public function __construct(DateStringParserTransform $transform)
    {
        $this->transform = $transform;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->addModelTransformer($this->transform);

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            "attr" => [
                "placeholder" => "JJ/MM/AAAA",
                "maxlength" => 10,
                "pattern" => DateParser::PATTERN_FR
            ]
        ]);
    }
    public function getParent()
    {
        return TextType::class;
    }
}