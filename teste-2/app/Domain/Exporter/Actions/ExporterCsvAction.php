<?php

namespace Domain\Exporter\Actions;

use Shared\DTO\Exporter\ExporterCsvDTO;

class ExporterCsvAction
{
    public function execute(ExporterCsvDTO $exporterCsvDto)
    {

        $handle = fopen($exporterCsvDto->filename, 'w');

        $content = $this->prepareContent($exporterCsvDto);

        foreach ($content as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);

        return $exporterCsvDto->filename;
    }

    private function prepareContent(ExporterCsvDTO $exporterCsvDto)
    {
        $contentFormated = [$exporterCsvDto->headers];

        foreach ($exporterCsvDto->content as $content) {
            $contentFormated[] = $content;
        }

        return $contentFormated;
    }
}
