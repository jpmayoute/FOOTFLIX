<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240621135811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_club_year ADD player_id INT NOT NULL, ADD club_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_club_year ADD CONSTRAINT FK_7F468CEE99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player_club_year ADD CONSTRAINT FK_7F468CEE61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_7F468CEE99E6F5DF ON player_club_year (player_id)');
        $this->addSql('CREATE INDEX IDX_7F468CEE61190A32 ON player_club_year (club_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_club_year DROP FOREIGN KEY FK_7F468CEE99E6F5DF');
        $this->addSql('ALTER TABLE player_club_year DROP FOREIGN KEY FK_7F468CEE61190A32');
        $this->addSql('DROP INDEX IDX_7F468CEE99E6F5DF ON player_club_year');
        $this->addSql('DROP INDEX IDX_7F468CEE61190A32 ON player_club_year');
        $this->addSql('ALTER TABLE player_club_year DROP player_id, DROP club_id');
    }
}
