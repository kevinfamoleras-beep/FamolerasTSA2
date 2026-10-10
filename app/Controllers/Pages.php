<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        return view('welcome', [
            'tasks' => $taskModel->getTodayTasks()
        ]);
    }

    public function profile()
    {
        $userModel = new UserModel();

        return view('profile', [
            'user' => $userModel->getDemoUser()
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
