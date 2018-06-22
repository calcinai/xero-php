<?php

namespace XeroPHP\Traits;

use XeroPHP\Models\Accounting\History;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;
use XeroPHP\Exception;
use XeroPHP\Helpers;

trait HistoryTrait
{
    public function addHistory(History $history)
    {
        /**
         * @var Object $this
         */
        $uri = sprintf('%s/%s/History', $this::getResourceURI(), $this->getGUID());

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_POST);

        $request->setBody(Helpers::arrayToXML(['HistoryRecords' => [($history->toStringArray())]]));
        $request->send();

        $response = $request->getResponse();

        return $this;
    }

    public function getHistory()
    {
        /**
         * @var Object $this
         */
        if ($this->hasGUID() === false) {
            throw new Exception(
                'History/Notes are only available to objects that exist remotely.'
            );
        }

        $uri = sprintf(
            '%s/%s/History',
            $this::getResourceURI(),
            $this->getGUID()
        );

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_GET);
        $request->send();

        $historyEntries = [];
        foreach ($request->getResponse()->getElements() as $element) {
            $history = new History($this->_application);
            $history->fromStringArray($element);
            $historyEntries[] = $history;
        }

        return $historyEntries;
    }
}
