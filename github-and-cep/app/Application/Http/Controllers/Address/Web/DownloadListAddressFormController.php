<?php

namespace Application\Http\Controllers\Address\Web;

use Application\Exceptions\BaseExcpetion;
use Application\Http\Controllers\Controller;
use Domain\Address\Interfaces\Repositories\IAddressRepository;
use Domain\Exporter\Actions\ExporterCsvAction;
use Shared\DTO\Exporter\ExporterCsvDTO;

class DownloadListAddressFormController extends Controller
{
    public function __invoke(
        ExporterCsvDTO $exporterCsvDto,
        ExporterCsvAction $exporterCsvAction,
        IAddressRepository $addressRepository
    )
    {
        try {
            $exporterCsvDto->register(
                'list-cep',
                [
                    'CEP',
                    'LOGRADOURO',
                    'BAIRRO',
                    'CIDADE',
                    'UF',
                ],
                $addressRepository->getAll()->toArray()
            );

            $filename = $exporterCsvAction->execute($exporterCsvDto);

            return response()->download($filename)->deleteFileAfterSend(true);
        } catch (BaseExcpetion $exception) {
            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        } catch (\Exception $exception) {

            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        }
    }
}
