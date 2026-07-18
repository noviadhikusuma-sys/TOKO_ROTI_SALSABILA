<?php

namespace App\Services;

use Supabase\Supabase;

class SupabaseService
{
    protected $client;

    public function __construct()
    {
        $this->client = Supabase::createClient(
            config('supabase.url'),
            config('supabase.key')
        );
    }

    /**
     * Get Supabase Client
     */
    public function client()
    {
        return $this->client;
    }

    /**
     * Query data from a table
     */
    public function from($table)
    {
        return $this->client->from($table);
    }

    /**
     * Insert data
     */
    public function insert($table, $data)
    {
        return $this->client->from($table)->insert($data)->execute();
    }

    /**
     * Update data
     */
    public function update($table, $data, $filterColumn, $filterValue)
    {
        return $this->client->from($table)
            ->update($data)
            ->eq($filterColumn, $filterValue)
            ->execute();
    }

    /**
     * Delete data
     */
    public function delete($table, $filterColumn, $filterValue)
    {
        return $this->client->from($table)
            ->delete()
            ->eq($filterColumn, $filterValue)
            ->execute();
    }

    /**
     * Get all data from table
     */
    public function getAll($table)
    {
        return $this->client->from($table)->select('*')->execute();
    }

    /**
     * Get single record
     */
    public function getById($table, $id)
    {
        return $this->client->from($table)
            ->select('*')
            ->eq('id', $id)
            ->single()
            ->execute();
    }
}
