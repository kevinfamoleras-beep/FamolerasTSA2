<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        return view('tasks', [
            'tasks' => $taskModel->getAllTasks()
        ]);
    }

    public function new()
    {
        return view('tasks_new');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]'
        ];

        if (!$this->validate($rules)) {
            return view('tasks_new', [
                'validation' => $this->validator
            ]);
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => trim((string) $this->request->getPost('title')),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('tasks_edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]'
        ];

        if (!$this->validate($rules)) {
            return view('tasks_edit', [
                'task'       => $task,
                'validation' => $this->validator
            ]);
        }

        $taskModel->update($id, [
            'title'     => trim((string) $this->request->getPost('title')),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (!$task || (int) $task['is_archived'] === 1) {
            throw PageNotFoundException::forPageNotFound();
        }

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}
