# MarkitUpBundle

Bundle is destined to add MarkitUp WYSIWYG editor to your Symfony2 project.
By analogy with the bundle https://github.com/ihqs/WysiwygBundle

## Installation

Download the code by adding the git module or editing the deps file in the root project.

### Download by editing deps file

    [MarkitUpBundle]
        git=git://github.com/KonstantinKuklin/MarkitUpBundle.git
        target=/bundles/Graybit/Bundle/MarkitUpBundle


Modify your autoloader.
Register namespace :

    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Graybit'                       => __DIR__.'/../vendor/bundles',
    ));

Instantiate Bundle in your app/AppKernel.php file

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Graybit\Bundle\MarkitUpBundle\GraybitMarkitUpBundle(),
        );
    }

## Configuration

Configure your application

    // app/config.yml
graybit_markit_up:
    textareaClass: "bbcode"
    bbcodeSettingFile: "bundles/graybitmarkitup/lib/sets/default/set.js"
    bbcodeClass: "mySettings"
    skinCss: "bundles/graybitmarkitup/lib/skins/markitup/style.css"
    setsCss: "bundles/graybitmarkitup/lib/sets/default/style.css"

run the command

    php app/console assets:install web/

to copy the resources to the projects web directory.

By default, markitup is enabled for textareas with class bbcode on the page

Add script to your templates/layout at the bottom of your page (for faster page display).

    {{ markitup_init() }}
