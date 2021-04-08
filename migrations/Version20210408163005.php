<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408163005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD sector_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F63FC6C5D FOREIGN KEY (sector_company_id) REFERENCES sector (id)');
        $this->addSql('CREATE INDEX IDX_4FBF094F63FC6C5D ON company (sector_company_id)');
        $this->addSql('ALTER TABLE sector DROP FOREIGN KEY FK_4BA3D9E8979B1AD6');
        $this->addSql('DROP INDEX IDX_4BA3D9E8979B1AD6 ON sector');
        $this->addSql('ALTER TABLE sector DROP company_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F63FC6C5D');
        $this->addSql('DROP INDEX IDX_4FBF094F63FC6C5D ON company');
        $this->addSql('ALTER TABLE company DROP sector_company_id');
        $this->addSql('ALTER TABLE sector ADD company_id INT NOT NULL');
        $this->addSql('ALTER TABLE sector ADD CONSTRAINT FK_4BA3D9E8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_4BA3D9E8979B1AD6 ON sector (company_id)');
    }
}
