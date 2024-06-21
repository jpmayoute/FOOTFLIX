<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240621135512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player ADD position_id INT NOT NULL, ADD country_id INT NOT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65DD842E46 FOREIGN KEY (position_id) REFERENCES position (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_98197A65DD842E46 ON player (position_id)');
        $this->addSql('CREATE INDEX IDX_98197A65F92F3E70 ON player (country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65DD842E46');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65F92F3E70');
        $this->addSql('DROP INDEX IDX_98197A65DD842E46 ON player');
        $this->addSql('DROP INDEX IDX_98197A65F92F3E70 ON player');
        $this->addSql('ALTER TABLE player DROP position_id, DROP country_id');
    }
}
