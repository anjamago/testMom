<?php


namespace App\Http\ResposeBase;


use phpDocumentor\Reflection\Types\Object_;

class ResponseBase
{

    private int $Code = 200;
    private string $Message = "";
    private array $Data;
    private int $Count = 0;


    public function  __construct($code = 200, $message="", array $data = []){

        $this->Code = $code;
        $this->Message = $message;
        $this->Data = $data;
        $this->Count = count($data);
    }

    public function get(): array
    {
        return [
            "code"=>$this->Code,
            "message"=>$this->Message,
            "data"=>$this->Data,
            "count"=>$this->Count,
        ];
    }

    public function status(): int
    {
        return $this->Code;
    }



}
