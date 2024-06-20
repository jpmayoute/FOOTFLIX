<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620172038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club_player_club_year (club_id INT NOT NULL, player_club_year_id INT NOT NULL, INDEX IDX_1E32650F61190A32 (club_id), INDEX IDX_1E32650FCDB40B07 (player_club_year_id), PRIMARY KEY(club_id, player_club_year_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club_player_club_year ADD CONSTRAINT FK_1E32650F61190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_player_club_year ADD CONSTRAINT FK_1E32650FCDB40B07 FOREIGN KEY (player_club_year_id) REFERENCES player_club_year (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club_player_club_year DROP FOREIGN KEY FK_1E32650F61190A32');
        $this->addSql('ALTER TABLE club_player_club_year DROP FOREIGN KEY FK_1E32650FCDB40B07');
        $this->addSql('DROP TABLE club_player_club_year');
    }
}
