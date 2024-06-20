<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620160334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_goals (player_id INT NOT NULL, goals_id INT NOT NULL, INDEX IDX_7856656999E6F5DF (player_id), INDEX IDX_78566569BD121F24 (goals_id), PRIMARY KEY(player_id, goals_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_goals ADD CONSTRAINT FK_7856656999E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_goals ADD CONSTRAINT FK_78566569BD121F24 FOREIGN KEY (goals_id) REFERENCES goals (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_goals DROP FOREIGN KEY FK_7856656999E6F5DF');
        $this->addSql('ALTER TABLE player_goals DROP FOREIGN KEY FK_78566569BD121F24');
        $this->addSql('DROP TABLE player_goals');
    }
}
