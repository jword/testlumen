<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class BaseController extends Controller
{
    /**
     * 统一输入输出方法
     * @param  mixed  $data     要输出的数据
     * @param  integer $count   总数
     * @param  integer $code    响应代码
     * @param  string  $callback 如果是jsonp响应则填写此项
     * @return json
     */
    protected function outputData($data, $count = 0, $code = 200, $callback = null)
    {
        empty($count) && ($count = count($data));
        $runtime = round((microtime(true) - APP_TIME) * 1000, 2) . 'ms';
        if ($callback) {
            return response()->json(['code' => $code, 'data' => $data, 'count' => $count, 'runtime' => $runtime])->setCallback($callback);
        } else {
            return response()->json(['code' => $code, 'data' => $data, 'count' => $count, 'runtime' => $runtime]);
        }
    }

    /**
     * 统一输入输出方法
     * @param  mixed  $data     要输出的数据
     * @param  integer $count   总数
     * @param  integer $code    响应代码
     * @param  string  $callback 如果是jsonp响应则填写此项
     * @return json
     */
    protected function outputMsg($msg, $code = 600, $callback = null)
    {
        $runtime = round((microtime(true) - APP_TIME) * 1000, 2) . 'ms';
        if ($callback) {
            return response()->json(['code' => $code, 'data' => '', 'msg' => $msg, 'runtime' => $runtime])->setCallback($callback);
        } else {
            return response()->json(['code' => $code, 'data' => '', 'msg' => $msg, 'runtime' => $runtime]);
        }
    }
}
