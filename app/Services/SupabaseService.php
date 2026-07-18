<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

final class SupabaseService
{
    private string $url;

    private string $key;

    private string $schema;

    public function __construct()
    {
        $url = config('supabase.url');
        $key = config('supabase.secret') ?: config('supabase.key');
        $schema = config('supabase.schema', 'public');

        if (! is_string($url) || $url === '') {
            throw new InvalidArgumentException('SUPABASE_URL belum dikonfigurasi.');
        }

        if (! is_string($key) || $key === '') {
            throw new InvalidArgumentException('SUPABASE_SECRET atau SUPABASE_KEY belum dikonfigurasi.');
        }

        $this->url = rtrim($url, '/');
        $this->key = $key;
        $this->schema = is_string($schema) && $schema !== '' ? $schema : 'public';
    }

    public function client(): PendingRequest
    {
        return $this->request();
    }

    public function insert(string $table, array $data): array
    {
        return $this->request()
            ->withHeader('Prefer', 'return=representation')
            ->post($this->tableUrl($table), $data)
            ->json();
    }

    public function update(string $table, array $data, string $filterColumn, int|string $filterValue): array
    {
        return $this->request()
            ->withQueryParameters([
                $filterColumn => 'eq.' . $filterValue,
            ])
            ->withHeader('Prefer', 'return=representation')
            ->patch($this->tableUrl($table), $data)
            ->json();
    }

    public function delete(string $table, string $filterColumn, int|string $filterValue): array
    {
        return $this->request()
            ->withQueryParameters([
                $filterColumn => 'eq.' . $filterValue,
            ])
            ->withHeader('Prefer', 'return=representation')
            ->delete($this->tableUrl($table))
            ->json();
    }

    public function getAll(string $table): array
    {
        return $this->request()
            ->get($this->tableUrl($table), ['select' => '*'])
            ->json();
    }

    public function getById(string $table, int|string $id): ?array
    {
        $records = $this->request()
            ->get($this->tableUrl($table), [
                'id' => 'eq.' . $id,
                'select' => '*',
                'limit' => 1,
            ])
            ->json();

        return is_array($records) ? ($records[0] ?? null) : null;
    }

    private function request(): PendingRequest
    {
        return Http::baseUrl($this->url . '/rest/v1')
            ->acceptJson()
            ->contentType('application/json')
            ->withHeaders([
                'apikey' => $this->key,
                'Authorization' => 'Bearer ' . $this->key,
                'Accept-Profile' => $this->schema,
                'Content-Profile' => $this->schema,
            ])
            ->throw();
    }

    private function tableUrl(string $table): string
    {
        return '/' . str_replace('.', '/', trim($table, '/'));
    }
}
