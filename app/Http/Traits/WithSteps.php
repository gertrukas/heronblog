<?php

namespace App\Http\Traits;

trait WithSteps {

    public $step = 1;
    public $stepsRules = [];

    public function validateAndIncrement()
    {
        $this->validate($this->stepsRules[$this->step]);
        $this->step++;
    }
   
    public function validateAndSubmit()
    {
        if (!empty($this->stepsRules[$this->step]))
            $this->validate($this->stepsRules[$this->step]);

        $this->submit();
    }
}
