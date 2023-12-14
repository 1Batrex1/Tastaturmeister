<?php

namespace App\Model;

use App\Service\Config;

class Admin
{

    private ?int $adminId = null;

    private ?string $adminPassword = null;

    public function getAdminId(): ?int
    {
        return $this->adminId;
    }

    public function setAdminId(?int $adminId): void
    {
        $this->adminId = $adminId;
    }

    public function getAdminPassword(): ?string
    {
        return $this->adminPassword;
    }

    public function setAdminPassword(?string $adminPassword): void
    {
        $this->adminPassword = $adminPassword;
    }

    public function fill($array): Admin
    {
        if (isset($array['admin_id']) && !$this->getAdminId()) {
            $this->setAdminId($array['admin_id']);
        }
        if (isset($array['admin_password']) && !$this->getAdminPassword()) {
            $this->setAdminPassword($array['admin_password']);
        }

        return $this;
    }

    public static function fromArray($array): Admin
    {
        $admin = new self();
        $admin->fill($array);

        return $admin;
    }


    public static function find($id): ?Admin
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM admin WHERE admin_id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $adminArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (!$adminArray) {
            return null;
        }
        $admin = Admin::fromArray($adminArray);

        return $admin;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if ($this->getAdminId()) {
            $sql = "UPDATE admin SET admin_password = :admin_password WHERE admin_id = :admin_id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':admin_id' => $this->getAdminId(),
                ':admin_password' => $this->getAdminPassword(),
            ]);
        } else {
            $sql = "INSERT INTO admin (admin_password) VALUES (:admin_password)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':admin_password' => $this->getAdminPassword(),
            ]);
            $this->setAdminId((int)$pdo->lastInsertId());
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM admin WHERE admin_id = :admin_id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':admin_id' => $this->getAdminId(),
        ]);

        $this->setAdminId(null);
        $this->setAdminPassword(null);
    }

}