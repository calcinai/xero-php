<?php

namespace XeroPHP\Traits\PracticeManager;

use XeroPHP\Exception;
use XeroPHP\Models\PracticeManager\CustomFieldValue;
use XeroPHP\Remote\Collection;
use XeroPHP\Remote\URL;
use XeroPHP\Remote\Request;
use XeroPHP\Models\Accounting\Attachment;

trait CustomFieldValueTrait
{
    abstract function getCustomFieldValueUri();

    abstract function getGuid();

    /**
     * @return Collection|CustomFieldValue[]
     * @throws Exception
     * @throws \XeroPHP\Remote\Exception
     * @throws \XeroPHP\Remote\Exception\BadRequestException
     * @throws \XeroPHP\Remote\Exception\ForbiddenException
     * @throws \XeroPHP\Remote\Exception\InternalErrorException
     * @throws \XeroPHP\Remote\Exception\NotAvailableException
     * @throws \XeroPHP\Remote\Exception\NotFoundException
     * @throws \XeroPHP\Remote\Exception\NotImplementedException
     * @throws \XeroPHP\Remote\Exception\OrganisationOfflineException
     * @throws \XeroPHP\Remote\Exception\RateLimitExceededException
     * @throws \XeroPHP\Remote\Exception\ReportPermissionMissingException
     * @throws \XeroPHP\Remote\Exception\UnauthorizedException
     */
    public function getCustomFieldValues()
    {
        /**
         * @var \XeroPHP\Remote\Model
         */
        if ($this->hasGUID() === false) {
            throw new Exception(
                'Custom Field Values are only available to objects that exist remotely.'
            );
        }

        $uri = sprintf(
            $this->getCustomFieldValueUri(),
            $this->getGUID()
        );

        $url = new URL($this->_application, $uri, URL::API_PRACTICE_MANAGER);
        $request = new Request($this->_application, $url, Request::METHOD_GET);
        $request->send();

        $customFieldValues = [];
        foreach ($request->getResponse()->getElements() as $element) {
            $customFieldValue = new CustomFieldValue($this->_application);
            $customFieldValue->fromStringArray($element);

            $customFieldValues[] = $customFieldValue;
        }

        return new Collection($customFieldValues);
    }
}
