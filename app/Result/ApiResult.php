<?php

namespace App\Result;

class ApiResult
{
    protected $success = false;

    protected $successMsg = '';

    protected $errors = [];

    protected $data = null;

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getSuccessMsg(): string
    {
        return $this->successMsg;
    }

    /**
     * @param string $successMsg
     */
    public function setSuccessMsg(string $successMsg): void
    {
        $this->successMsg = $successMsg;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

    public function appendError(array $errors)
    {
       $this->errors = array_merge($this->getErrors(), $errors);
    }

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param null $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
}