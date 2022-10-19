<?php

//This class is a pseudo-model to represent an attachment.  Can't be directly put ot fetched.

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\URL;
use XeroPHP\Application;
use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;

class Attachment extends Model
{
    /**
     * Xero Unique Identifier.
     *
     * @property string AttachmentID
     */

    /**
     * @property string FileName
     */

    /**
     * @property string Url
     */

    /**
     * @property string MimeType
     */

    /**
     * @property int ContentLength
     */

    /**
     * Actual file content (binary).
     *
     * @var string
     */
    private $content;

    private $local_handle;

    /**
     * Get the GUID Property if it exists.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'AttachmentID';
    }

    /**
     * Get a list of properties.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'AttachmentID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FileName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Url' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'MimeType' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ContentLength' => [false, self::PROPERTY_TYPE_INT, null, false, false],
        ];
    }

    /**
     * Get a list of the supported HTTP Methods.
     *
     * @return array
     */
    public static function getSupportedMethods()
    {
        return [
            Request::METHOD_GET,
            Request::METHOD_PUT,
            Request::METHOD_POST,
        ];
    }

    /**
     * return the URI of the resource (if any).
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return '';
    }

    //Do this with a file handle please
    public static function createFromLocalFile($file_name, $mime_type = null)
    {

        //Try to guess.  Might be questionable on non-*nix machines
        if ($mime_type === null) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $info = $finfo->file($file_name);

            if ($info !== false) {
                $mime_type = $info;
            }
        }

        $content_length = filesize($file_name);
        $path_info = pathinfo($file_name);

        $instance = new self();
        $instance->fromStringArray([
            'MimeType' => $mime_type,
            'ContentLength' => $content_length,
            'FileName' => $path_info['basename'],
        ]);
        $instance->setLocalHandle(fopen($file_name, 'rb'));

        return $instance;
    }

    public static function createFromBinary($data, $file_name, $mime_type)
    {
        $content_length = strlen($data);

        $instance = new self();
        $instance->fromStringArray([
            'MimeType' => $mime_type,
            'ContentLength' => $content_length,
            'FileName' => $file_name,
        ]);

        $instance->content = $data;

        return $instance;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        if (! isset($this->content)) {
            //If it's been created locally, you can just read it back.
            if (isset($this->local_handle)) {
                rewind($this->local_handle);
                while (! feof($this->local_handle)) {
                    $this->content .= fread($this->local_handle, 8192);
                }
                //Otherwise, if it can be fetched
            } elseif (isset($this->_data['Url'])) {
                $this->content = self::downloadContent($this->_application, $this->_data['Url']);
            }
        }

        return $this->content;
    }

    private static function downloadContent(Application $app, $url)
    {
        $url = new URL($app, $url);
        $request = new Request($app, $url, Request::METHOD_GET);
        $request->setHeader(Request::HEADER_ACCEPT, '*/*');

        $request->send();

        return $request->getResponse()->getResponseBody();
    }

    /**
     * @return string
     */
    public function getAttachmentID()
    {
        return $this->_data['AttachmentID'];
    }

    /**
     * @return int
     */
    public function getContentLength()
    {
        return $this->_data['ContentLength'];
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->_data['FileName'];
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->_data['MimeType'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_data['Url'];
    }

    /**
     * @return mixed
     */
    public function getLocalHandle()
    {
        return $this->local_handle;
    }

    /**
     * @param mixed $local_handle
     */
    public function setLocalHandle($local_handle)
    {
        $this->local_handle = $local_handle;
    }

    /**
     * @return bool
     */
    public static function isPageable()
    {
        return false;
    }

    public static function getAPIStem()
    {
        return '';
    }

    public static function getRootNodeName()
    {
        // TODO: Implement getRootNodeName() method.
    }
}
