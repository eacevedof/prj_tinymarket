<?php
// src/Repository/UserRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;

class UserRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad
    protected static function entityClass(): string
    {
        return User::class;
    }

    public function findOneById(string $id): ?User
    {
        /**
         * @var User $user
         */
        $user = $this->objectRepository->find($id);
        return $user;
    }

    public function findOneByEmail(string $email): ?User
    {
        /** @var User $user */
        $user = $this->objectRepository->findOneBy(["email" => $email]);
        return $user;
    }

    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var User $user */
        $user = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $user;
    }

    public function save(User $user): void
    {
        $this->saveEntity($user);
    }

}
