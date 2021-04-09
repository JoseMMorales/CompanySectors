<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408160919 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company CHANGE phone phone VARCHAR(32) NOT NULL, CHANGE email email VARCHAR(32) NOT NULL');
        $this->addSql('ALTER TABLE sector ADD company_id INT NOT NULL');
        $this->addSql('ALTER TABLE sector ADD CONSTRAINT FK_4BA3D9E8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_4BA3D9E8979B1AD6 ON sector (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company CHANGE phone phone VARCHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE sector DROP FOREIGN KEY FK_4BA3D9E8979B1AD6');
        $this->addSql('DROP INDEX IDX_4BA3D9E8979B1AD6 ON sector');
        $this->addSql('ALTER TABLE sector DROP company_id');
    }
}
