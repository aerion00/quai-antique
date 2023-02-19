<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218115520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, hour10 TINYINT(1) NOT NULL, hour11 TINYINT(1) NOT NULL, hour12 TINYINT(1) NOT NULL, hour13 TINYINT(1) NOT NULL, hour17 TINYINT(1) NOT NULL, hour18 TINYINT(1) NOT NULL, hour19 TINYINT(1) NOT NULL, hour20 TINYINT(1) NOT NULL, hour21 TINYINT(1) NOT NULL, hour22 TINYINT(1) NOT NULL, hour23 TINYINT(1) NOT NULL, hour24 TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE schedule');
    }
}
