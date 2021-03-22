<?php

namespace Core;

abstract class Validation
{
    private bool $passed = false;
    private array $errors = array();

    /**
     * Except mostly form data which need to be validated
     *
     * @param $variable
     * @param array $fields
     * @return Validation
     */
    protected function check($variable, array $fields = array()): Validation
    {
        foreach ($fields as $field => $rules) {

          $field = explode('|', $field);

          foreach ($rules as $rule => $rule_value) {

            $value = trim($variable[$field[0]]);
            $name = isset($field[1]) ? $field[1] : $field[0];

            if ($rule === 'required' && empty($value)) {
              $this->addError($field[0], "{$name} is required.");
            } else if (!empty($value)) {
              switch ($rule) {
                  case 'min':
                      if(strlen($value) < $rule_value) {
                        $this->addError($field[0], "{$name} must contain at least {$rule_value} characters.");
                      }
                  break;
                  case 'max':
                      if(strlen($value) > $rule_value) {
                        $this->addError($field[0], "{$name} can have max {$rule_value} characters.");
                      }
                  break;
              }
            }

          }
        }

        if (empty($this->errors)) {
          $this->passed = true;
        }

        return $this;
    }

    private function addError(string $field, string $error): void
    {
      $this->errors[$field] = $error;
    }

    public function errors(): array
    {
      return $this->errors;
    }

    public function passed(): bool
    {
      return $this->passed;
    }
}
