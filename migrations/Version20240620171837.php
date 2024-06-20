<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620171837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_player_club_year (player_id INT NOT NULL, player_club_year_id INT NOT NULL, INDEX IDX_9E910E7599E6F5DF (player_id), INDEX IDX_9E910E75CDB40B07 (player_club_year_id), PRIMARY KEY(player_id, player_club_year_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_club_year (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_player_club_year ADD CONSTRAINT FK_9E910E7599E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_player_club_year ADD CONSTRAINT FK_9E910E75CDB40B07 FOREIGN KEY (player_club_year_id) REFERENCES player_club_year (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_player_club_year DROP FOREIGN KEY FK_9E910E7599E6F5DF');
        $this->addSql('ALTER TABLE player_player_club_year DROP FOREIGN KEY FK_9E910E75CDB40B07');
        $this->addSql('DROP TABLE player_player_club_year');
        $this->addSql('DROP TABLE player_club_year');
    }
}
