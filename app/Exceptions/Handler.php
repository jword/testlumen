<?php namespace App\Exceptions;

use Exception;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class Handler extends ExceptionHandler
{

    /**
     * 不上报的异常列表.
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException',
    ];

    /**
     * 异常信息上报.
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        //return parent::report($e);
    }

    /**
     * 异常信息输出.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        $message = $e->getMessage();
        if ($e instanceof HttpExceptionInterface) {
            $code = $e->getStatusCode();
            if ($code == 404) {
                $message = 'Sorry, the route you are request could not be found.';
            }
        } else {
            $code = $e->getCode();
        }

        (env('APP_ENV') == 'product') && ($trace = '');
        if (empty($message)) {
            $message = 'Whoops, looks like something went wrong.';
        }

        $error = [
            'code'    => $code,
            'msg'     => $message,
            'trace'   => $e->getFile() . ':' . $e->getLine(),
            'runtime' => round((microtime(true) - APP_TIME) * 1000, 2) . 'ms',
        ];
        return response()->json($error);
    }
}
