<?php
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\MoFileLoader;

if (!function_exists('translate')) {
    function translate($mo_file, $msg)
    {
        $locale = 'en';
        //$file_path = base_path("lang/{$mo_file}-{$locale}.mo");
        $file_path = base_path("config/lang/admin-fa_IR.mo");

        $translator = new Translator($locale);
        $translator->addLoader('mo', new MoFileLoader());
        $translator->addResource('mo', $file_path, $locale);

        return $translator->trans($msg);
    }
}
