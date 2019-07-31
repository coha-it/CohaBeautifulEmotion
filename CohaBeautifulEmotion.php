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

        // $service->update('s_emotion_attributes', 'coha_inherit', 'boolean', [
        //     'label' => 'Inherit from Master',
        //     'supportText' => 'If set, the Settings from Master-Landingpage will be inherit. If not, your following Settings down below will be used.',
        //     'helpText' => 'If set, the Settings from Master-Landingpage will be inherit. If not, your following Settings down below will be used.',
        //     'translatable' => true,            'displayInBackend' => true,            'position' => 18,            'custom' => true,
        // ]);

        $service->update('s_emotion_attributes', 'coha_font_color', 'string', [
            'label' => 'Font Color',
            'supportText' => 'For Example (Without Quotation Marks): Insert "#333" for grey. You can also add "rgba(241,30,21)" for red etc.',
            'helpText' => 'It will be rendered as Inline-CSS with the CSS-Sytax "background-color:".',
            'translatable' => true,            'displayInBackend' => true,            'position' => 19,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_background_color', 'string', [
            'label' => 'Background Color',
            'supportText' => 'For Example (Without Quotation Marks): Insert "#333" for grey. You can also add "rgba(241,30,21)" for red etc.',
            'helpText' => 'It will be rendered as Inline-CSS with the CSS-Sytax "background-color:".',
            'translatable' => true,            'displayInBackend' => true,            'position' => 20,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_background_img_url', 'string', [
            'label' => 'Background Image Url',
            'supportText' => 'For Example (Without Quotation Marks): Insert "https://www.your-server.tld/media/images/mountains.jpg".',
            'helpText' => 'If left empty, All Background-Image Syntax below is irrelevant.',
            'translatable' => true,            'displayInBackend' => true,            'position' => 21,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_background_size', 'string', [
            'label' => 'Background Size',
            'supportText' => 'For Example (Without Quotation Marks): Insert "1500px". Possible options: 100%, 50%, 1000px, 100vw, 50vw, 50vh etc.',
            'helpText' => 'px is pixels. vw is the procentage of the user\'s ViewportWidth. vh is the same in ViewportHeight',
            'translatable' => true,            'displayInBackend' => true,            'position' => 22,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_background_position', 'string', [
            'label' => 'Background Position',
            'supportText' => 'For Example (Without Quotation Marks): Insert "top center". Possible options: top center, center, right bottom, 0%, 50% 50%, 100% 100%, 50px 100px, -25px -50vw, etc.',
            'helpText' => 'px is pixels. Possible is percentage %, words like "top center right bottom". The first value is the y-axis. Second is the x-axis. If second is empty, the first value will simply be repeated',
            'translatable' => true,            'displayInBackend' => true,            'position' => 23,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_background_repeat', 'string', [
            'label' => 'Background Repeat',
            'supportText' => 'For Example (Without Quotation Marks): Insert "no-repeat". Possible options: repeat|repeat-x|repeat-y|no-repeat|initial|inherit',
            'helpText' => 'Most of the time no-repeat will be used',
            'translatable' => true,            'displayInBackend' => true,            'position' => 24,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_background_attachment', 'string', [
            'label' => 'Background Attachment',
            'supportText' => 'For Example (Without Quotation Marks): Insert "no-repeat". Possible options: scroll|fixed|local|initial|inherit',
            'translatable' => true,            'displayInBackend' => true,            'position' => 25,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_width', 'string', [
            'label' => 'Width',
            'supportText' => 'For Example (Without Quotation Marks): Insert "100%".  Possible options: 100%, 50%, 100vw, 50vw, 50vh etc.',
            'helpText' => 'It will be rendered as Inline-CSS with the CSS-Sytax "width:".',
            'translatable' => true,            'displayInBackend' => true,            'position' => 26,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_max_width', 'string', [
            'label' => 'Max-Width',
            'supportText' => 'For Example (Without Quotation Marks): Insert "1500px".  Possible options: 100%, 50%, 1000px, 100vw, 50vw, 50vh etc.',
            'helpText' => 'It will be rendered as Inline-CSS with the CSS-Sytax "max-width:".',
            'translatable' => true,            'displayInBackend' => true,            'position' => 27,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_classes', 'string', [
            'label' => 'CSS - Classes',
            'supportText' => 'For Example (Without Quotation Marks): "grey-colored blue-custom-class container" etc.',
            'helpText' => 'This will be the Content inside the Element\'s HTML-Inline-Class alias "CSS-Tag"',
            'translatable' => true,            'displayInBackend' => true,            'position' => 30,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_inline_css', 'string', [
            'label' => 'CSS - Inline',
            'supportText' => 'For Example (Without Quotation Marks): "color: red; text-transform: uppercase;" etc.',
            'helpText' => 'This will be the Content inside the Element\'s HTML-Inline-CSS alias "Style-Tag"',
            'translatable' => true,            'displayInBackend' => true,            'position' => 31,            'custom' => true,
        ]);

        $service->update('s_emotion_attributes', 'coha_css_rule_global', 'text', [
            'label' => 'CSS - Rule (global)',
            'supportText' => 'For Example (Without Quotation Marks): "body {color: blue;}". Global for the Whole Page',
            'helpText' => 'But it will be Global on the Whole Page / Body.',
            'translatable' => true,            'displayInBackend' => true,            'position' => 32,            'custom' => true,
        ]);


        $service->update('s_emotion_attributes', 'coha_html_tags', 'string', [
            'label' => 'HTML-Tags',
            'supportText' => 'For Example (Without The Single Quotation Marks): \' data-attribute="52x" data-length="100" \'.',
            'helpText' => 'It will simply insert the HTML-Tags to the Emotion-Element Container. Seperated by Spacings.',
            'translatable' => true,            'displayInBackend' => true,            'position' => 100,            'custom' => true,
        ]);

        $this->update();
    }

    public function update() {
        // 
    }

    // On Activation
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
    }

    public function uninstall(UninstallContext $context)
    {
        $service = $this->container->get('shopware_attribute.crud_service');
        //$service->delete('s_emotion_attributes', 'coha_inherit');
        $service->delete('s_emotion_attributes', 'coha_font_color');
        $service->delete('s_emotion_attributes', 'coha_background_color');
        $service->delete('s_emotion_attributes', 'coha_background_img_url');
        $service->delete('s_emotion_attributes', 'coha_background_size');
        $service->delete('s_emotion_attributes', 'coha_background_position');
        $service->delete('s_emotion_attributes', 'coha_background_repeat');
        $service->delete('s_emotion_attributes', 'coha_background_attachment');
        $service->delete('s_emotion_attributes', 'coha_width');
        $service->delete('s_emotion_attributes', 'coha_max_width');
        $service->delete('s_emotion_attributes', 'coha_classes');
        $service->delete('s_emotion_attributes', 'coha_inline_css');
        $service->delete('s_emotion_attributes', 'coha_css_rule_global');
        $service->delete('s_emotion_attributes', 'coha_html_tags');
    }

    public function addLessFiles(){
        return new LessDefinition(
            [],
            [
                // AOS Animate/Animation on Scroll
                __DIR__ . '/Resources/views/frontend/_public/src/css/aos/aos.css',

                //__DIR__ . '/Resources/views/frontend/_public/src/css/css3-animate-it/animations.css',
                
                // Owl Carousel 2 - disabled
                // __DIR__ . '/Resources/views/frontend/_public/src/owl-carousel/OwlCarousel2/dist/assets/owl.carousel.min.css',

                // Beautiful Emotions
                __DIR__ . '/Resources/views/frontend/_public/src/less/beautiful-emotion.less',
            ]
        );
    }

    public function onCollectJavascriptFiles()
    {
        $jsFiles = [
            // Parallax.JS
            $this->getPath() . '/Resources/views/frontend/_public/src/parallax-js/parallax/dist/parallax.min.js',

            // Animation on Scroll
            $this->getPath() . '/Resources/views/frontend/_public/src/js/aos/aos.js',
            $this->getPath() . '/Resources/views/frontend/_public/src/js/aos/aos-init.js',

            //$this->getPath() . '/Resources/views/frontend/_public/src/js/css3-animate-it/css3-animate-it.js',

            // Owl Carousel 2 - disabled
            // $this->getPath() . '/Resources/views/frontend/_public/src/owl-carousel/OwlCarousel2/dist/owl.carousel.js',

            // ScrollMagic
            $this->getPath() . '/Resources/views/frontend/_public/src/scrollmagic/assets/js/lib/greensock/TweenMax.min.js',
            $this->getPath() . '/Resources/views/frontend/_public/src/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
            $this->getPath() . '/Resources/views/frontend/_public/src/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js',
            // $this->getPath() . '/Resources/views/frontend/_public/src/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js',
            $this->getPath() . '/Resources/views/frontend/_public/src/scrollmagic/scrollmagic-init.js',

            // Custom JS
            $this->getPath() . '/Resources/views/frontend/_public/src/js/beautiful-emotions.js',

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
