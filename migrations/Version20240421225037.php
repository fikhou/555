<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240421225037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D19FA60A76ED395 ON entreprise (user_id)');
        $this->addSql('ALTER TABLE reeser ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE reeser ADD CONSTRAINT FK_5A34AB9EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A34AB9EA76ED395 ON reeser (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60A76ED395');
        $this->addSql('DROP INDEX IDX_D19FA60A76ED395 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP user_id');
        $this->addSql('ALTER TABLE reeser DROP FOREIGN KEY FK_5A34AB9EA76ED395');
        $this->addSql('DROP INDEX IDX_5A34AB9EA76ED395 ON reeser');
        $this->addSql('ALTER TABLE reeser DROP user_id');
    }
}
