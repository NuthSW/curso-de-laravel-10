<?php

namespace App\Repositories;

use App\DTO\Suporte\{
    CreateSuporteDTO,
    UpdateSuporteDTO,
};
use stdClass;

interface SuporteRepositoryInterface
{
    public function getAll(string $filter=null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateSuporteDTO $dto): stdClass;
    public function update(UpdateSuporteDTO $dto): stdClass|null;
}