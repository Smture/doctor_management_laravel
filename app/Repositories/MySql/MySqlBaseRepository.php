<?php

namespace App\Repositories\MySql;

use App\Repositories\BaseRepository;

class MySqlBaseRepository implements BaseRepository
{
    public $pageLength = 50;
    public $relations = [];

    /**
     * Pagination length
     *
     * @param int $length
     * @return MySqlBaseRepository
     */
    public function paginate(int $length): BaseRepository
    {
        $this->pageLength = $length;
        return $this;
    }

    /**
     * Lazy load relations
     *
     * @param array $relations
     * @return MySqlBaseRepository
     */
    public function with(array $relations): BaseRepository
    {
        $this->relations = $relations;
        return $this;
    }
}
