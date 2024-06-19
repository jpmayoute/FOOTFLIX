<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619212738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stats_number (stats_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_2580F85770AA3482 (stats_id), INDEX IDX_2580F85730A1DE10 (number_id), PRIMARY KEY(stats_id, number_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stats_number ADD CONSTRAINT FK_2580F85770AA3482 FOREIGN KEY (stats_id) REFERENCES stats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stats_number ADD CONSTRAINT FK_2580F85730A1DE10 FOREIGN KEY (number_id) REFERENCES number (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stats_number DROP FOREIGN KEY FK_2580F85770AA3482');
        $this->addSql('ALTER TABLE stats_number DROP FOREIGN KEY FK_2580F85730A1DE10');
        $this->addSql('DROP TABLE stats_number');
    }
}
