<?php
namespace App\Http\Controllers;

use \DB;
use \Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $result = DB::connection('ask')
            ->table('ask')
            ->select('askid', 'department', 'content')
            ->where('askid', '>', 0)
            ->skip(10)
            ->take(10)
            ->orderBy('askid', 'desc')
            ->get();
        $count = DB::connection('ask')->table('ask')->count();
        return $this->outputData($result, $count);
    }

    public function get(Request $request, $id)
    {
        // 模块：40 参数验证未通过：300-399
        // 模块：40 普通非参数类错误：600-699
        // 模块：40 系统错误、致命错误：500-599
        if (empty($id)) {
            return $this->outputMsg('id不能为空', 40301);
        }
        $ask = $user = DB::table('ask')
            ->where('askid', $id)
            ->first();

        if (empty($ask)) {
            return $this->outputMsg('记录不存在', 40600);
        }
        return $this->outputData($ask);
    }

    public function add(Request $request)
    {
        if (!$request->has(array('department'))) {
            return $this->outputMsg('部门不能为空', 40301);
        }
        if (!$request->has(array('content'))) {
            return $this->outputMsg('提问内容不能为空', 40302);
        }
        $content    = $request->input('content');
        $department = $request->input('department');
        //insertGetId可以返回id,多个使用二维数组,底层会自动参数绑定
        $result = DB::table('ask')->insert(
            ['department' => $department, 'content' => $content, 'addtime' => time()]
        );
        if (!$result) {
            return $this->outputMsg('操作失败', 40600);
        }
        return $this->outputData($result);
    }

    public function update(Request $request, $id)
    {
        if (empty($id)) {
            return $this->outputMsg('id不能为空', 40301);
        }
        if (!$request->has(array('content'))) {
            return $this->outputMsg('提问内容不能为空', 40302);
        }
        $content = $request->input('content');
        $result  = DB::table('ask')
            ->where('askid', $id)
            ->update(['content' => $content]);
        if (!$result) {
            return $this->outputMsg('操作失败', 40600);
        }
        return $this->outputData($result);
    }
}
