<?php

namespace App\Models;

use App\constants\DatabaseConstants;
use App\constants\TaskConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // todo: try UUID

    protected $table = DatabaseConstants::TABLE_TASKS;

    /**
     * The model's default values for attributes.
     * @var array
     */
    protected $attributes = [
        "completed" => TaskConstants::COMPLETED_NO,
    ];

    public static function getTableName(): string
    {
        return DatabaseConstants::TABLE_TASKS;
    }

    public static function findAll(array $fields = ["*"])
    {
        return static::all($fields);
    }

    public static function findModel(int $id, array $fields = ["*"])
    {
        return Task::where()->all();
    }

    // TODO: override when authentication system is implemented - to get a task by id & created_by
    /**
     * @inheritDoc
     */
//    public function resolveRouteBinding($value, $field = null)
//    {
//        return $this->where('name', $value)->firstOrFail();
//    }
}
