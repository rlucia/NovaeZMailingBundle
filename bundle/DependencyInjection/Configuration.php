<?php
/**
 * NovaeZMailingBundle Bundle.
 *
 * @package   Novactive\Bundle\eZMailingBundle
 *
 * @author    Novactive <s.morel@novactive.com>
 * @copyright 2018 Novactive
 * @license   https://github.com/Novactive/NovaeZMailingBundle/blob/master/LICENSE MIT Licence
 */
declare(strict_types=1);

namespace Novactive\Bundle\eZMailingBundle\DependencyInjection;

use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\SiteAccessAware;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration.
 */
class Configuration extends SiteAccessAware\Configuration
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('nova_ezmailing');
        $systemNode  = $this->generateScopeBaseNode($rootNode);

        $systemNode
                ->scalarNode('email_subject_prefix')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('email_from_address')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('email_from_name')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('email_return_path')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('simple_mailer')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('mailing_mailer')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('default_mailinglist_id')->isRequired()->cannotBeEmpty()->end();

        return $treeBuilder;
    }
}
