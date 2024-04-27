<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422004118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE address Address VARCHAR(255) DEFAULT \'NULL\', CHANGE role Role VARCHAR(255) DEFAULT \'NULL\' NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX Email ON user (Email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX Email ON user');
        $this->addSql('ALTER TABLE user CHANGE Address address VARCHAR(255) DEFAULT NULL, CHANGE Role role VARCHAR(255) NOT NULL');
    }
}
