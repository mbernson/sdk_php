<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\BunqModel;
use bunq\Model\Generated\Object\Error;

/**
 * view for reading, updating and listing the scheduled instance.
 *
 * @generated
 */
class ScheduleInstance extends BunqModel
{
    /**
     * Field constants.
     */
    const FIELD_STATE = 'state';

    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/schedule/%s/schedule-instance/%s';
    const ENDPOINT_URL_UPDATE = 'user/%s/monetary-account/%s/schedule/%s/schedule-instance/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/schedule/%s/schedule-instance';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'ScheduleInstance';

    /**
     * The state of the scheduleInstance. (FINISHED_SUCCESSFULLY, RETRY,
     * FAILED_USER_ERROR)
     *
     * @var string
     */
    protected $state;

    /**
     * The schedule start time (UTC).
     *
     * @var string
     */
    protected $timeStart;

    /**
     * The schedule end time (UTC).
     *
     * @var string
     */
    protected $timeEnd;

    /**
     * The message when the scheduled instance has run and failed due to user
     * error.
     *
     * @var Error[]
     */
    protected $errorMessage;

    /**
     * The scheduled object.
     *
     * @var BunqModel
     */
    protected $scheduledObject;

    /**
     * The result object of this schedule instance. (payment, payment batch)
     *
     * @var BunqModel
     */
    protected $resultObject;

    /**
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $scheduleId
     * @param int $scheduleInstanceId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<ScheduleInstance>
     */
    public static function get(ApiContext $apiContext, $userId, $monetaryAccountId, $scheduleId, $scheduleInstanceId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $monetaryAccountId, $scheduleId, $scheduleInstanceId]
            ),
            $customHeaders
        );

        return static::fromJson($responseRaw);
    }

    /**
     * @param ApiContext $apiContext
     * @param mixed[] $requestMap
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $scheduleId
     * @param int $scheduleInstanceId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<int>
     */
    public static function update(ApiContext $apiContext, array $requestMap, $userId, $monetaryAccountId, $scheduleId, $scheduleInstanceId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->put(
            vsprintf(
                self::ENDPOINT_URL_UPDATE,
                [$userId, $monetaryAccountId, $scheduleId, $scheduleInstanceId]
            ),
            $requestMap,
            $customHeaders
        );

        return static::processForId($responseRaw);
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $scheduleId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<BunqModel[]|ScheduleInstance[]>
     */
    public static function listing(ApiContext $apiContext, $userId, $monetaryAccountId, $scheduleId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId, $monetaryAccountId, $scheduleId]
            ),
            $customHeaders
        );

        return static::fromJsonList($responseRaw, self::OBJECT_TYPE);
    }

    /**
     * The state of the scheduleInstance. (FINISHED_SUCCESSFULLY, RETRY,
     * FAILED_USER_ERROR)
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * The schedule start time (UTC).
     *
     * @return string
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * @param string $timeStart
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    /**
     * The schedule end time (UTC).
     *
     * @return string
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * @param string $timeEnd
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;
    }

    /**
     * The message when the scheduled instance has run and failed due to user
     * error.
     *
     * @return Error[]
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param Error[] $errorMessage
     */
    public function setErrorMessage(array$errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * The scheduled object.
     *
     * @return BunqModel
     */
    public function getScheduledObject()
    {
        return $this->scheduledObject;
    }

    /**
     * @param BunqModel $scheduledObject
     */
    public function setScheduledObject(BunqModel $scheduledObject)
    {
        $this->scheduledObject = $scheduledObject;
    }

    /**
     * The result object of this schedule instance. (payment, payment batch)
     *
     * @return BunqModel
     */
    public function getResultObject()
    {
        return $this->resultObject;
    }

    /**
     * @param BunqModel $resultObject
     */
    public function setResultObject(BunqModel $resultObject)
    {
        $this->resultObject = $resultObject;
    }
}
