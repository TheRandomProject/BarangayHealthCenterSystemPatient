<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityLog extends Model
{
    protected $table = "activity_log";

    public function scopeJoinCreatedBy($query)
    {
    	$query->addSelect([
    		  DB::raw("CONCAT(patients.first_name, ' ', patients.last_name) AS created_by")
    	]);

    	$query->leftJoin('patients', 'activity_log.causer_id', '=', 'patients.id');

    	return $query;
    }
}
