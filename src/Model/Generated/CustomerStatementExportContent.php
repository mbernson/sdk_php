<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Http\BunqResponse;
use bunq\Model\BunqModel;

/**
 * Fetch the raw content of a statement export. The returned file format
 * could be MT940, CSV or PDF depending on the statement format specified
 * during the statement creation. The doc won't display the response of a
 * request to get the content of a statement export.
 *
 * @generated
 */
class CustomerStatementExportContent extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/customer-statement/%s/content';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'CustomerStatementExportContent';

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $monetaryAccountId
     * @param int $customerStatementId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<string>
     */
    public static function listing(ApiContext $apiContext, $userId, $monetaryAccountId, $customerStatementId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);

        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId, $monetaryAccountId, $customerStatementId]
            ),
            $customHeaders
        );

        return new BunqResponse($responseRaw->getBodyString(), $responseRaw->getHeaders());
    }
}
