<?php
namespace Graybit\Bundle\MarkitUpBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Twig Extension for MarkitUp support.
 *
 * @author  Konstantin Kuklin <konstantin.kuklin@gmail.com>
 */
class MarkitUpExtension extends \Twig_Extension
{
    /**
     * Container
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'markitup_init' => new \Twig_Function_Method($this, 'markitup_init', array('is_safe' => array('html')))
        );
    }
    /**
     * MarkitUp initializations
     */
    public function markitup_init()
    {
        $config = $this->getContainer()->getParameter('graybit_markit_up.config');
        return (
                    $this->getContainer()->get('templating')->render('GraybitMarkitUpBundle:MarkitUp:init.html.twig',
                        array(
                            'config' => $config,
                        )
                    )
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'graybit_markit_up';
    }
}
