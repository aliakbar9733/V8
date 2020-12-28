<?php


namespace App\Helper;

class Submitter
{
    private const ACTION_ALERT = "ACTION_ALERT";
    private const REDIRECT = "REDIRECT";
    private const REFRESH = "REFRESH";
    private array $response;

    public function __construct(bool $status, string $msg)
    {
        $this->response = ["status" => $status, "msg" => $msg];
        return $this;
    }

    public static function toastRedirect($msg, $uri = "", $color = "success", $data = [])
    {
        $response = new self(true, $msg);
        $response->setDataAttribute($data);
        return $response->actionAlert("toastr", $uri, $color)->send();
    }

    public static function swalRedirect($msg, $uri = "", $color = "success", $data = [])
    {
        $response = new self(true, $msg);
        $response->setDataAttribute($data);
        return $response->actionAlert("swal", $uri, $color)->send();
    }

    public static function refresh()
    {
        return (new self(true, ""))->setAction(self::REFRESH)->send();
    }

    public function send()
    {
        return json_encode($this->response);
    }

    public function actionAlert($mode, $uri, $color)
    {
        $this->setMode($mode);
        $this->setColor($color);
        $this->setUri($uri);
        $this->setAction(self::ACTION_ALERT);
        return $this;
    }

    public function setMode($mode)
    {
        $this->response["mode"] = $mode;
        return $this;
    }

    public function setColor($color)
    {
        $this->response["color"] = $color;
        return $this;
    }

    public function setUri($uri)
    {
        $this->response["url"] = $uri;
        return $this;
    }

    public function setAction($action)
    {
        $this->response["action"] = $action;
        return $this;
    }

    public function setDataAttribute($data)
    {
        $this->response["data"] = $data;
        return $this;

    }

    public static function error($msg)
    {
        $response = new self(false, $msg);
        return $response->send();
    }

    public static function jsonResponse(array $data, $responseCode = 200)
    {
        $response["type"] = "json";
        foreach ($data as $key => $value) {
            $response[$key] = $value;
        }
        self::responseCode($responseCode);
        return json_encode($response);
    }

    public static function responseCode($code)
    {
        http_response_code($code);
    }

    public function redirectAction($uri)
    {
        $this->setUri($uri);
        $this->setAction(self::REDIRECT);
    }

    public function refreshAction()
    {
        $this->setAction(self::REFRESH);
    }
}
