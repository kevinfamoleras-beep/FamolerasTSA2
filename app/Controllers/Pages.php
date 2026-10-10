<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel->getTodayTasks();

        return view('welcome', $data);
    }

    public function profile()
    {
        $userModel = new UserModel();

        $data['user'] = $userModel->getDemoUser();

        return view('profile', $data);
    }

    public function about()
    {
        return view('about');
    }
}