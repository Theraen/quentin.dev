<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606102134 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE technology_portfolio (id INT AUTO_INCREMENT NOT NULL, portfolio_id INT DEFAULT NULL, name VARCHAR(75) NOT NULL, INDEX IDX_1DC4ED0DB96B5643 (portfolio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social (id INT AUTO_INCREMENT NOT NULL, about_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_7161E187D087DB59 (about_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, name_degree VARCHAR(150) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, school_name VARCHAR(150) NOT NULL, specialisation VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, about_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, INDEX IDX_57698A6AD087DB59 (about_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE desc_experience (id INT AUTO_INCREMENT NOT NULL, experience_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, INDEX IDX_4241EC0646E90E27 (experience_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE desc_school (id INT AUTO_INCREMENT NOT NULL, school_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, INDEX IDX_B6CF216CC32A47EE (school_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portfolio (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, category VARCHAR(75) NOT NULL, images VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, about_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, percent INT NOT NULL, INDEX IDX_5E3DE477D087DB59 (about_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, mail VARCHAR(255) NOT NULL, subject VARCHAR(200) NOT NULL, message LONGTEXT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, name_trade VARCHAR(150) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, enterprise VARCHAR(150) NOT NULL, postal_code INT NOT NULL, city VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(150) NOT NULL, firstname VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE technology_portfolio ADD CONSTRAINT FK_1DC4ED0DB96B5643 FOREIGN KEY (portfolio_id) REFERENCES portfolio (id)');
        $this->addSql('ALTER TABLE social ADD CONSTRAINT FK_7161E187D087DB59 FOREIGN KEY (about_id) REFERENCES about (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AD087DB59 FOREIGN KEY (about_id) REFERENCES about (id)');
        $this->addSql('ALTER TABLE desc_experience ADD CONSTRAINT FK_4241EC0646E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE desc_school ADD CONSTRAINT FK_B6CF216CC32A47EE FOREIGN KEY (school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477D087DB59 FOREIGN KEY (about_id) REFERENCES about (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE desc_school DROP FOREIGN KEY FK_B6CF216CC32A47EE');
        $this->addSql('ALTER TABLE technology_portfolio DROP FOREIGN KEY FK_1DC4ED0DB96B5643');
        $this->addSql('ALTER TABLE desc_experience DROP FOREIGN KEY FK_4241EC0646E90E27');
        $this->addSql('ALTER TABLE social DROP FOREIGN KEY FK_7161E187D087DB59');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AD087DB59');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477D087DB59');
        $this->addSql('DROP TABLE technology_portfolio');
        $this->addSql('DROP TABLE social');
        $this->addSql('DROP TABLE school');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE desc_experience');
        $this->addSql('DROP TABLE desc_school');
        $this->addSql('DROP TABLE portfolio');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE about');
    }
}
