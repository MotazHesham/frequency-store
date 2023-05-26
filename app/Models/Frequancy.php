<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Frequancy extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'frequancies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const FREQUENCY_TYPE_SELECT = [
        'hf'  => 'HF',
        'vhf' => 'VHF',
        'uhf' => 'UHF',
    ];

    public static $searchable = [
        'frequency',
        'description',
        'tag_1',
        'tag_2',
        'tag_3',
    ];

    protected $fillable = [
        'frequency',
        'frequency_type',
        'description',
        'tag_1',
        'tag_2',
        'tag_3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function frequency(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value,3),
        );
    }
}
