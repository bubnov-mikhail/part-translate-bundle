<?php
namespace Bubnov\PartTranslateBundle\Twig\Extension;

use Symfony\Component\Translation\TranslatorInterface;

class PartTranslateExtension extends \Twig_Extension
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('partTranslate', [$this, 'onPartTranslateFilter']),
        ];
    }

    /**
     * Finds all %tokens% in string and translates them
     *
     * @param string $string String with markers in format %marker_without_spaces%
     * @return string
     */
    public function onPartTranslateFilter($string = '')
    {
        $parts = [];
        if (!preg_match_all('/%(\S+?)%/', $string, $parts)) {
            return $string;
        }
        $search = [];
        $replace = [];
        
        foreach ($parts[1] as $p => $part) {
            if ($parts[0][$p] == '%'.$this->translator->trans($part).'%') {
                continue;
            }
            $search[] = $parts[0][$p];
            $replace[] = $this->translator->trans($part);
        }

        return str_replace($search, $replace, $string);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'parttranslate_extension';
    }

    /**
     *
     * @param TranslatorInterface $translator
     * @return \Bubnov\PartTranslateBundle\Twig\Extension\PartTranslateExtension
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;

        return $this;
    }
}
