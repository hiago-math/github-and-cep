<?php

namespace Infrastructure\Apis;

use Illuminate\Support\Str;

class BaseServiceApi
{

    /**
     * @var array
     */
    protected array $headers = [];

    /**
     * @var string
     */
    protected string $baseUrl;

    /**
     * @return string
     */
    protected function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    protected function setBaseUrl($baseUrl)
    {
        $lastChar = Str::substr($baseUrl, -1);
        if ($lastChar !== DIRECTORY_SEPARATOR) $baseUrl .= DIRECTORY_SEPARATOR;

        $this->baseUrl = $baseUrl;
    }

    /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $headers
     */
    protected function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param string $method
     * @param string $uri
     * @return mixed
     * @throws \Exception
     */
    protected function request(string $method, string $uri)
    {
        $this->updateBaseUrl($uri);
        $this->setHeaders(["User-Agent: " . Str::afterLast($uri, '/')]);

        try {
            $ch = curl_init($uri);

            send_log("Log de request -> {$uri}: ", [$this->baseUrl, $method, $uri]);
            curl_setopt($ch, CURLOPT_URL, $this->baseUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = curl_exec($ch);
            curl_close($ch);

            if (!$response) {
                throw new \Exception('Erro na requisicao: ' . curl_error($ch));
            }

            curl_close($ch);
        } catch (\Exception $exception) {
            send_log("RequisicaoException: ", [$uri, $exception->getMessage()], 'error', $exception);
            throw $exception;
        }

        send_log("Log de response -> {$uri}: ", [$uri]);

        return $response;
    }

    protected function updateBaseUrl(string $uri)
    {
        $this->baseUrl = $this->baseUrl . $uri;
    }

}
