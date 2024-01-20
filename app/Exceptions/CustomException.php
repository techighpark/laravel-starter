<?php

namespace App\Exceptions;

use Carbon\Carbon;
use Exception;
use Throwable;

class CustomException extends Exception
{
    //
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);

    }

    public function getCustomData(): array
    {

        return [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
            'invalidInputs' => [
                'name' => '??',
                'type' => '??',
                'message' => '??'
            ],
            'timestamp' => Carbon::now()->timestamp,
            'datetime' => Carbon::now()->toDateTimeString(),
            'traceId' => '??',
            'data' => '??',
        ];
    }

    public function handle(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('/');
    }
}
