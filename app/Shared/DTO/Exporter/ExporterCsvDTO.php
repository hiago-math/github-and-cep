<?php

namespace Shared\DTO\Exporter;

use Shared\DTO\DTOAbstract;

class ExporterCsvDTO extends DTOAbstract
{
    /**
     * @var string
     */
    public string $filename;

    /**
     * @var array
     */
    public array $headers;

    /**
     * @var array
     */
    public array $content;

    /**
     * @param string $filename
     * @param array $headers
     * @param array $content
     * @return ExporterCsvDTO
     */
    public function register(string $filename, array $headers = [], array $content = []): self
    {
        $this->filename = add_extension($filename, 'csv');
        $this->headers = $headers;
        $this->content =$content;

        return $this;
    }


}
