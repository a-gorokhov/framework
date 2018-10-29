<?php

/**
 * Модель записи в блоге
 */

class Entry extends \framework\db\ActiveRecord
{
    public static function tableName()
    {
        return 'entry';
    }

    public function attributes()
    {
        return [
            'id', //ID записи
            'title', //Название
            'description', //Описание
            'updated_at',  //Дата изменения
            'image' //Путь картинки
        ];
    }
}