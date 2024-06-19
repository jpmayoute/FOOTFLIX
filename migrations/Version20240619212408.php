<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619212408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_palmares (player_id INT NOT NULL, palmares_id INT NOT NULL, INDEX IDX_F999A7A999E6F5DF (player_id), INDEX IDX_F999A7A9804A4B7D (palmares_id), PRIMARY KEY(player_id, palmares_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_stats (player_id INT NOT NULL, stats_id INT NOT NULL, INDEX IDX_E8351CEC99E6F5DF (player_id), INDEX IDX_E8351CEC70AA3482 (stats_id), PRIMARY KEY(player_id, stats_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_club (player_id INT NOT NULL, club_id INT NOT NULL, INDEX IDX_1AF4684199E6F5DF (player_id), INDEX IDX_1AF4684161190A32 (club_id), PRIMARY KEY(player_id, club_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_palmares ADD CONSTRAINT FK_F999A7A999E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_palmares ADD CONSTRAINT FK_F999A7A9804A4B7D FOREIGN KEY (palmares_id) REFERENCES palmares (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_stats ADD CONSTRAINT FK_E8351CEC99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_stats ADD CONSTRAINT FK_E8351CEC70AA3482 FOREIGN KEY (stats_id) REFERENCES stats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_club ADD CONSTRAINT FK_1AF4684199E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_club ADD CONSTRAINT FK_1AF4684161190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD player_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('CREATE INDEX IDX_9474526C99E6F5DF ON comment (player_id)');
        $this->addSql('ALTER TABLE player ADD country_id INT NOT NULL, ADD position_id INT NOT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65DD842E46 FOREIGN KEY (position_id) REFERENCES position (id)');
        $this->addSql('CREATE INDEX IDX_98197A65F92F3E70 ON player (country_id)');
        $this->addSql('CREATE INDEX IDX_98197A65DD842E46 ON player (position_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_palmares DROP FOREIGN KEY FK_F999A7A999E6F5DF');
        $this->addSql('ALTER TABLE player_palmares DROP FOREIGN KEY FK_F999A7A9804A4B7D');
        $this->addSql('ALTER TABLE player_stats DROP FOREIGN KEY FK_E8351CEC99E6F5DF');
        $this->addSql('ALTER TABLE player_stats DROP FOREIGN KEY FK_E8351CEC70AA3482');
        $this->addSql('ALTER TABLE player_club DROP FOREIGN KEY FK_1AF4684199E6F5DF');
        $this->addSql('ALTER TABLE player_club DROP FOREIGN KEY FK_1AF4684161190A32');
        $this->addSql('DROP TABLE player_palmares');
        $this->addSql('DROP TABLE player_stats');
        $this->addSql('DROP TABLE player_club');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C99E6F5DF');
        $this->addSql('DROP INDEX IDX_9474526C99E6F5DF ON comment');
        $this->addSql('ALTER TABLE comment DROP player_id');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65F92F3E70');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65DD842E46');
        $this->addSql('DROP INDEX IDX_98197A65F92F3E70 ON player');
        $this->addSql('DROP INDEX IDX_98197A65DD842E46 ON player');
        $this->addSql('ALTER TABLE player DROP country_id, DROP position_id');
    }
}
