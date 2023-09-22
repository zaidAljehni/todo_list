<?php

namespace App\Models;

use App\constants\DatabaseConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public static function getTableName(): string
    {
        return DatabaseConstants::TABLE_TASKS;
    }
}
