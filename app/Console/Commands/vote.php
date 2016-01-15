<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class Vote extends Command
{
    /**
     * 命令名称.
     * @var string
     */
    protected $name = 'task:test';

    /**
     * 命令简介.
     * @var string
     */
    protected $description = 'test task.';

    /**
     * 执行命令(php artisan task:test).
     * @return mixed
     */
    public function fire()
    {
        while (true) {
            echo '1234' . PHP_EOL;
            sleep(2);
        }
    }
}
