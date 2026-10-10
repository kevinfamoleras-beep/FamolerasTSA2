<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'created_at'
    ];

    // Retrieve only tasks scheduled for today
    public function getTodayTasks()
    {
        return $this->builder()
            ->where('task_date', date('Y-m-d'))
            ->orderBy('task_date', 'ASC')
            ->get()
            ->getResultArray();
    }

    // Retrieve all tasks ordered by date
    public function getAllTasks()
    {
        return $this->builder()
            ->orderBy('task_date', 'ASC')
            ->get()
            ->getResultArray();
    }
}
