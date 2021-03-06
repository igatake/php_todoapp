<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS = [
        0 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        1 => [ 'label' => '着手中', 'class' => 'label-info' ],
        2 => [ 'label' => '完了' ,'class' => ''],
    ];

    public function getStatusLabelAttribute() {

        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute() {

        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
}
