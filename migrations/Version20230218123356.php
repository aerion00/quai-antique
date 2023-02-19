<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218123356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule ADD hour VARCHAR(255) NOT NULL, ADD time_of_the_day VARCHAR(255) NOT NULL, ADD boolean TINYINT(1) NOT NULL, DROP hour10, DROP hour11, DROP hour12, DROP hour13, DROP hour17, DROP hour18, DROP hour19, DROP hour20, DROP hour21, DROP hour22, DROP hour23, DROP hour24');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule ADD hour11 TINYINT(1) NOT NULL, ADD hour12 TINYINT(1) NOT NULL, ADD hour13 TINYINT(1) NOT NULL, ADD hour17 TINYINT(1) NOT NULL, ADD hour18 TINYINT(1) NOT NULL, ADD hour19 TINYINT(1) NOT NULL, ADD hour20 TINYINT(1) NOT NULL, ADD hour21 TINYINT(1) NOT NULL, ADD hour22 TINYINT(1) NOT NULL, ADD hour23 TINYINT(1) NOT NULL, ADD hour24 TINYINT(1) NOT NULL, DROP hour, DROP time_of_the_day, CHANGE boolean hour10 TINYINT(1) NOT NULL');
    }
}
