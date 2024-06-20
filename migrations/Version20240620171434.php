<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620171434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, club_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_club (player_id INT NOT NULL, club_id INT NOT NULL, INDEX IDX_1AF4684199E6F5DF (player_id), INDEX IDX_1AF4684161190A32 (club_id), PRIMARY KEY(player_id, club_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_club ADD CONSTRAINT FK_1AF4684199E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_club ADD CONSTRAINT FK_1AF4684161190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_club DROP FOREIGN KEY FK_1AF4684199E6F5DF');
        $this->addSql('ALTER TABLE player_club DROP FOREIGN KEY FK_1AF4684161190A32');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE player_club');
    }
}
