<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    protected $fillable = [
        'file_name',
        'parent_id'
    ];

    protected $table = 'parent_attachments';

    // relationship back to parent
    public function parent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }
}
