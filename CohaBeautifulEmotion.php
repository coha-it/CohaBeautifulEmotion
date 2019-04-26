<?php 

namespace CohaBeautifulEmotion;

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Theme\LessDefinition;
use Shopware\Components\Plugin\Context\ActivateContext;

class CohaBeautifulEmotion extends Plugin
{

    public function install(InstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');

        $service->update('s_emotion_attributes', 'coha_background_colour', 'string', [
            'label' => 'Background Colour',
            'supportText' => 'For Example (Without Quotation Marks): Insert "#333" for grey. You can also add "rgba(241,30,21)" for red etc.',
            'helpText' => 'Or a background-image as url in CSS-Background-Syntax',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 25,
            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_classes', 'string', [
            'label' => 'CSS - Classes',
            'supportText' => 'For Example (Without Quotation Marks): "grey-coloured blue-custom-class container" etc.',
            'helpText' => 'This will be the Content inside the Element\'s HTML-Inline-Class alias "CSS-Tag"',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 26,
            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_inline_css', 'string', [
            'label' => 'CSS - Inline',
            'supportText' => 'For Example (Without Quotation Marks): "color: red; text-transform: uppercase;" etc.',
            'helpText' => 'This will be the Content inside the Element\'s HTML-Inline-CSS alias "Style-Tag"',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 27,
            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_css_rule_global', 'text', [
            'label' => 'CSS - Rule (global)',
            'supportText' => 'For Example (Without Quotation Marks): "body {color: blue;}". Global for the Whole Page',
            'helpText' => 'But it will be Global on the Whole Page / Body.',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 29,
            'custom' => true,
        ]);


        $service->update('s_emotion_attributes', 'coha_html_tags', 'string', [
            'label' => 'HTML-Tags',
            'supportText' => 'For Example (Without The Single Quotation Marks): \' data-attribute="52x" data-length="100" \'.',
            'helpText' => 'It will simply insert the HTML-Tags to the Emotion-Element Container. Seperated by Spacings.',
            'translatable' => true,
            'displayInBackend' => true,
            'position' => 100,
            'custom' => true,
        ]);
    }

    // On Activation
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
    }

    public function uninstall(UninstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');
        $service->delete('s_emotion_attributes', 'coha_background_colour');
        $service->delete('s_emotion_attributes', 'coha_classes');
        $service->delete('s_emotion_attributes', 'coha_inline_css');
        $service->delete('s_emotion_attributes', 'coha_css_rule_global');
    }

    public function addLessFiles(){
        return new LessDefinition(
            [],
            [
                __DIR__ . '/Resources/views/frontend/_public/src/css/aos/aos.css',
                //__DIR__ . '/Resources/views/frontend/_public/src/css/css3-animate-it/animations.css',
                __DIR__ . '/Resources/views/frontend/_public/src/less/beautiful-emotion.less',
            ]
        );
    }

    public function onCollectJavascriptFiles()
    {
        $jsFiles = [
            $this->getPath() . '/Resources/views/frontend/_public/src/js/aos/aos.js',
            $this->getPath() . '/Resources/views/frontend/_public/src/js/aos/aos-init.js'
            //$this->getPath() . '/Resources/views/frontend/_public/src/js/css3-animate-it/css3-animate-it.js',
        ];
        return new ArrayCollection($jsFiles);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch_Frontend' => ['onFrontend',-100],
            'Enlight_Controller_Action_PreDispatch_Widgets' => ['onFrontend',-100],
            'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles',
            'Theme_Compiler_Collect_Plugin_Javascript' => 'onCollectJavascriptFiles',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     * @throws \Exception
     */
    public function onFrontend(\Enlight_Event_EventArgs $args)
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views/'
        );
    }

}
