<?php

namespace App\Http\Traits;

use App\Models\Percentage;

trait WithMessages
{

    public function showMessage(string $type, string $message, $variables = [], $paramsModal = [], $typeCmp = 'notification', $closeModal = true)
    {
        if (!is_array($variables))
            $variables = [$variables];
        if ($typeCmp === 'alert')
            $this->emitTo('messages', $type, $message);
        else
            $this->dispatchBrowserEvent('show-notification', [
                'type' => $type,
                'message' => $message
            ]);

        $this->dispatchBrowserEvent('hide-dropdowns');
        
        if ($closeModal) {
            $this->dispatchBrowserEvent('close-modal', json_encode($paramsModal));
            $this->dispatchBrowserEvent('set-dismiss-all-modal');
        }

        foreach ($variables as $variable) {
            $this->$variable = null;
        }
    }

    public function showError($message, $variables = [], $paramsModal = [], $type = 'notification', $closeModal = true)
    {
        if (is_array($message)) {
            $message = $this->handleErrorDefaultMessage($message);
        }
        $this->showMessage('error', $message, $variables, $paramsModal, $type, $closeModal);
    }

    public function showSuccess($message, $variables = [], $paramsModal = [], $type = 'notification', $closeModal = true)
    {
        if (is_array($message)) {
            $message = $this->handleSuccessDefaultMessage($message);
        }
        $this->showMessage('success', $message, $variables, $paramsModal, $type, $closeModal);
    }

    public function showWarning($message, $variables = [], $paramsModal = [], $type = 'notification', $closeModal = true)
    {
        if (is_array($message)) {
            $message = $this->handleWarningDefaultMessage($message);
        }
        $this->showMessage('warning', $message, $variables, $paramsModal, $type, $closeModal);
    }

    /**
     * @param $message : [
     *      'action': 'add' | 'clone' | 'edit' | 'delete' ...
     *      'message': Model::$singularMessage | Model::$pluralMessage
     * ]
     * @return string
     */

    private function handleErrorDefaultMessage($message)
    {
        $determinateAction = $this->handleDeterminateAction($message['action'], $message['message']['grammaticalNumber']);
        if (!$determinateAction) {
            return 'La operación no pudo ser realizado';
        }
        $determinateGrammaticalNumber = $message['message']['grammaticalNumber'] === 'singular' ? 'pudo' : 'pudieron';
        $complement = isset($message['complement']) ? $message['complement'] :'';
        return $message['message']['article']
        . ' ' . $message['message']['substantive']
        . " no $determinateGrammaticalNumber ser $determinateAction " . $complement ;
    }

    private function handleSuccessDefaultMessage($message)
    {
        $determinateAction = $this->handleDeterminateAction($message['action'], $message['message']['grammaticalNumber']);
        if (!$determinateAction) {
            return 'La operación ha sido realizado exitosamente';
        }
        $determinateGrammaticalNumber = $message['message']['grammaticalNumber'] === 'singular' ? 'ha' : 'han';
        return $message['message']['article']
            . ' ' . $message['message']['substantive']
            . " $determinateGrammaticalNumber sido $determinateAction exitosamente " . isset($message['complement']) ?? '';
    }

    private function handleWarningDefaultMessage($message)
    {
        $determinateAction = $this->handleDeterminateAction($message['action'], $message['message']['grammaticalNumber']);
        if (!$determinateAction) {
            return 'La operación no puede ser realizado';
        }
        $determinateGrammaticalNumber = $message['message']['grammaticalNumber'] === 'singular' ? 'puede' : 'pueden';
        return $message['message']['article']
            . ' ' . $message['message']['substantive']
            . " no $determinateGrammaticalNumber ser $determinateAction " . isset($message['complement']) ?? '';
    }

    private function handleDeterminateAction($action, $grammaticalNumber)
    {
        switch ($action) {
            case 'add':
            case 'clone':
                $determinateAction = 'creado';
                break;
            case 'delete':
                $determinateAction = 'eliminado';
                break;
            case 'download':
                $determinateAction = 'descargado';
                break;
            case 'edit':
                $determinateAction = 'modificado';
                break;
            case 'export':
                $determinateAction = 'exportado';
                break;
            case 'import':
                $determinateAction = 'importado';
                break;
            default:
                return null;
                break;
        }
        if ($grammaticalNumber === 'plural') {
            $determinateAction .= 's';
        }
        return $determinateAction;
    }

}
