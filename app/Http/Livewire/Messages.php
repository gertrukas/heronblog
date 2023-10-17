<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Messages extends Component
{
    public $errorMessages;
    public $error;
    public $success;
    public $warning;

    public $prefix;

    public function getListeners()
    {
        return [
            $this->prefix . 'success' => 'setSuccess',
            $this->prefix . 'error' => 'setError',
            $this->prefix . 'warning' => 'setWarning',
        ];
    }

    public function mount()
    {
        $this->success = session('success') ?? null;
        $this->error = session('error') ?? null;
        $this->warning = session('warning') ?? null;
        $this->handleMessageNotification();
    }

    public function setSuccess($message)
    {
        $this->error = null;
        $this->warning = null;
        $this->success = $message;
    }

    public function setError($message)
    {
        $this->success = null;
        $this->warning = null;
        $this->error = $message;
    }

    public function setWarning($message)
    {
        $this->success = null;
        $this->error = null;
        $this->warning = $message;
    }

    private function handleMessageNotification()
    {
        $success = session('success-notification') ?? null;
        $error = session('error-notification') ?? null;
        $warning = session('warning-notification') ?? null;
        if ($success) {
            $this->dispatchBrowserEvent('show-notification', [
                'type' => 'success',
                'message' => $success
            ]);
        }
        if ($error) {
            $this->dispatchBrowserEvent('show-notification', [
                'type' => 'error',
                'message' => $error
            ]);
        }
        if ($warning) {
            $this->dispatchBrowserEvent('show-notification', [
                'type' => 'warning',
                'message' => $warning
            ]);
        }

    }

    public function render()
    {
        return view('livewire.messages');
    }
}
