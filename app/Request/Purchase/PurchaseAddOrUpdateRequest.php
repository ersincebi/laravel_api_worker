<?php

namespace App\Request\Purchase;

class PurchaseAddOrUpdateRequest
{
	protected $id;

	protected $clientToken;

	protected $receiptHash;
	
	protected $status;
	
	protected $expireDate;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getClientToken()
	{
		return $this->clientToken;
	}

	/**
	 * @param mixed $clientToken
	 */
	public function setClientToken($clientToken): void
	{
		$this->clientToken = $clientToken;
	}

	/**
	 * @return mixed
	 */
	public function getReceiptHash()
	{
		return $this->receiptHash;
	}

	/**
	 * @param mixed $receiptHash
	 */
	public function setReceiptHash($receiptHash): void
	{
		$this->receiptHash = $receiptHash;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus($status): void
	{
		$this->status = $status;
	}

	/**
	 * @return mixed
	 */
	public function getExpireDate()
	{
		return $this->expireDate;
	}

	/**
	 * @param mixed $expireDate
	 */
	public function setExpireDate($expireDate): void
	{
		$this->expireDate = $expireDate;
	}

}