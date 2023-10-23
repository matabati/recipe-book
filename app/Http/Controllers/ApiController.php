<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @var int
     */
    private $statusCode;

    public function respondArrayResult($data)
    {
        return $this
            ->SetStatusCode(Response::HTTP_OK)
            ->respond([
                'value' => $data
            ]);
    }

    public function respondItemResult($item)
    {
        return $this
            ->setStatusCode(Response::HTTP_OK)
            ->respond([
                'item' => $item
            ]);
    }

    /**
     * @param $statusCode
     * @return $this
     */
    private function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

       /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    private function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

}
