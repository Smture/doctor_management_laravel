<?php

namespace App\Repositories;

interface BaseRepository
{
    /**
     * Pagination length
     *
     * @param int $length
     * @return $this
     */
    public function paginate(int $length): BaseRepository;

    /**
     * Lazy load relations
     *
     * @param array $relations
     * @return $this
     */
    public function with(array $relations): BaseRepository;
}
