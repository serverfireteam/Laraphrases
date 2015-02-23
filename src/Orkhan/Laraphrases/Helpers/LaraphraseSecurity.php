<?php namespace Orkhan\Laraphrases\Helpers;

use Illuminate\Support\Facades\Config;

trait LaraphraseSecurity {

    /**
     * If user can edit
     *
     * @return bool
     */
    public static function canEditPhrase()
    {
        $can_edit = Config::get('inlineEdit.can_edit');
        return $can_edit();
    }

    /**
     * If editable mode on
     *
     * @return bool
     */
    public static function isEditableModeOn()
    {
        $is_editable_mode_on = Config::get('inlineEdit.is_editable_mode_on');
        return $is_editable_mode_on();
    }

    /**
     * Whitelisted class attribute
     *
     * @param $record string
     * @param $attribute string
     *
     * @return bool
     */
    public static function isInWhiteList($class, $attribute)
    {
        return in_array($attribute, Config::get('inlineEdit.white_list.'.$class));
    }

}