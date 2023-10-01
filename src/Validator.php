<?php

namespace Mazed\PHPValidator;

use Mazed\PHPValidator\Exception\RuleErrorException;

class Validator
{
    protected $errorBag;
    protected $inputContainer;

    public function parseRule($rule)
    {
        $exp = explode(':', $rule, 2);
        $ruleName = $exp[0];
        $params = [];

        if (isset($exp[1])) {
            $params = explode(',', $exp[1]);
        }

        return [$ruleName, $params];

    }

    public function validate($data, $ruleFields, $customMessages = null, $attributeLabels = null)
    {
        $this->inputContainer = new InputDataContainer($data);

        $this->errorBag = new ErrorBag();

        foreach ($ruleFields as $field => $rules) {

            $attributeLabel = $field;

            if (isset($attributeLabels[$field])) {
                $attributeLabel = $attributeLabels[$field];
            }

            $this->inputContainer->setAttributeKey($field);

            $this->inputContainer->setAttributeLabel($attributeLabel);

            foreach ($rules as $ruleName) {

                list($ruleName, $paramValues) = $this->parseRule($ruleName);
                $ruleClass = $this->resolveRule($ruleName);
                $ruleClass->setInputDataContainer($this->inputContainer);
                $ruleClass->setRuleName($ruleName);

                if (!empty($paramValues)) {
                    $ruleClass->setParameterValues($ruleClass->getParamKeys(), $paramValues);
                }

                $isValidated = $ruleClass->validate($this->inputContainer->getAttributeValue());

                if (!$isValidated && $ruleClass->skipRule()) {
                    $this->errorBag->addError($ruleClass, $customMessages);
                    break;
                }

            }
        }

        return $this;

    }

    public function fails()
    {
        return !empty($this->errorBag->getErrors()) ? true : false;
    }

    public function errors()
    {
        return $this->errorBag->getErrors();
    }

    protected function resolveRule($ruleName)
    {
        if (is_string($ruleName)) {
            $ruleClass = "Mazed\PHPValidator\\Rules\\" . str_replace(' ', '', ucwords(str_replace('_', ' ', $ruleName))) . 'Rule';

            if (!class_exists($ruleClass)) {
                throw new RuleErrorException("Unsupported validation rule: $ruleName");
            }

            return new $ruleClass;

        } else if (is_subclass_of($ruleName, Rule::class)) {

            $customRuleClass = \is_object($ruleName) ? $ruleName : new $ruleName();
            return $customRuleClass;

        }

    }

}
