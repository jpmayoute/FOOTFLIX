<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240621140304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE decisif_pass ADD player_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE decisif_pass ADD CONSTRAINT FK_C3903CE99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_C3903CE99E6F5DF ON decisif_pass (player_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE decisif_pass DROP FOREIGN KEY FK_C3903CE99E6F5DF');
        $this->addSql('DROP INDEX IDX_C3903CE99E6F5DF ON decisif_pass');
        $this->addSql('ALTER TABLE decisif_pass DROP player_id');
    }
}
