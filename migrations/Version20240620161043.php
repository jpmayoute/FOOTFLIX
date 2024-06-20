<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240620161043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_decisif_pass (player_id INT NOT NULL, decisif_pass_id INT NOT NULL, INDEX IDX_8C0453EC99E6F5DF (player_id), INDEX IDX_8C0453EC8958A5BD (decisif_pass_id), PRIMARY KEY(player_id, decisif_pass_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_decisif_pass ADD CONSTRAINT FK_8C0453EC99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_decisif_pass ADD CONSTRAINT FK_8C0453EC8958A5BD FOREIGN KEY (decisif_pass_id) REFERENCES decisif_pass (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_decisif_pass DROP FOREIGN KEY FK_8C0453EC99E6F5DF');
        $this->addSql('ALTER TABLE player_decisif_pass DROP FOREIGN KEY FK_8C0453EC8958A5BD');
        $this->addSql('DROP TABLE player_decisif_pass');
    }
}
