<?php

namespace App\Request\Register;

class RegisterAddOrUpdateRequest
{
	protected $id;

	protected $uid;

	protected $appId;

	protected $language;
	
	protected $device_os;

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
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getUid()
	{
		return $this->uid;
	}

	/**
	 * @param mixed $uid
	 */
	public function setUid($uid)
	{
		$this->uid = $uid;
	}

	/**
	 * @return mixed
	 */
	public function getAppId()
	{
		return $this->appId;
	}

	/**
	 * @param mixed $appId
	 */
	public function setAppId($appId)
	{
		$this->appId = $appId;
	}

	/**
	 * @return mixed
	 */
	public function getLanguage()
	{
		return $this->language;
	}

	/**
	 * @param mixed $language
	 */
	public function setLanguage($language)
	{
		$this->language = $language;
	}

	/**
	 * @return mixed
	 */
	public function getDeviceOs()
	{
		return $this->device_os;
	}

	/**
	 * @param mixed $device_os
	 */
	public function setDeviceOs($device_os)
	{
		$this->device_os = $device_os;
	}
}