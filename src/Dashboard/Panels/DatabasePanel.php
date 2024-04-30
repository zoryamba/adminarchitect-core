<?php

namespace Terranet\Administrator\Dashboard\Panels;

use Terranet\Administrator\Architect;
use Terranet\Administrator\Dashboard\Panel;
use Terranet\Administrator\Traits\Stringify;
use function admin\db\connection;

class DatabasePanel extends Panel
{
    use Stringify;

    public function render()
    {
        $dbStats = $this->getDatabaseStats();

        return view(Architect::template()->dashboard('database'), [
            'dbStats' => $dbStats,
        ]);
    }

    /**
     * @return mixed
     */
    protected function getDatabaseStats()
    {
        if (connection('mysql')) {
            $query = $this->connection()->raw('SHOW TABLE STATUS')->getValue($this->connection()->getQueryGrammar());
            return $this->connection()->select($query);
        }

        return collect([]);
    }

    protected function connection()
    {
        return app('db');
    }
}
