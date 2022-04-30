<?php
namespace App\Model;

use DateTimeInterface;

interface TimeStampedInterface {
    public function getCreatedAt() : ?\DateTimeInterface;
    public function setCreatedAt(DateTimeInterface $createdAt);
    public function getUpdatedAt(): ?\DateTimeInterface;
    public function setUpdatedAt(DateTimeInterface $updatedAt);
}




?>