<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230510195827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateurs (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cartes (id INT AUTO_INCREMENT NOT NULL, administrateurs_id INT NOT NULL, titre LONGTEXT NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_D8B89555C86024E2 (administrateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, nombre_convives_par_defaut VARCHAR(255) NOT NULL, allergies LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convives_maximum (id INT AUTO_INCREMENT NOT NULL, nombre_de_convives VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE galeries (id INT AUTO_INCREMENT NOT NULL, administrateurs_id INT NOT NULL, titre LONGTEXT NOT NULL, INDEX IDX_EB9F215AC86024E2 (administrateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires (id INT AUTO_INCREMENT NOT NULL, administrateurs_id INT NOT NULL, jours LONGTEXT NOT NULL, heures TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', INDEX IDX_39B7118FC86024E2 (administrateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, administrateurs_id INT NOT NULL, titre LONGTEXT NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_727508CFC86024E2 (administrateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, visiteurs_id INT NOT NULL, nombre_couverts VARCHAR(255) NOT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', heure_prevue TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', INDEX IDX_4DA239AB014612 (clients_id), INDEX IDX_4DA239BF668307 (visiteurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, visiteurs_id INT NOT NULL, administrateurs_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_1483A5E9AB014612 (clients_id), UNIQUE INDEX UNIQ_1483A5E9BF668307 (visiteurs_id), UNIQUE INDEX UNIQ_1483A5E9C86024E2 (administrateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteurs (id INT AUTO_INCREMENT NOT NULL, compte_id INT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DEFA5132F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cartes ADD CONSTRAINT FK_D8B89555C86024E2 FOREIGN KEY (administrateurs_id) REFERENCES administrateurs (id)');
        $this->addSql('ALTER TABLE galeries ADD CONSTRAINT FK_EB9F215AC86024E2 FOREIGN KEY (administrateurs_id) REFERENCES administrateurs (id)');
        $this->addSql('ALTER TABLE horaires ADD CONSTRAINT FK_39B7118FC86024E2 FOREIGN KEY (administrateurs_id) REFERENCES administrateurs (id)');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CFC86024E2 FOREIGN KEY (administrateurs_id) REFERENCES administrateurs (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239BF668307 FOREIGN KEY (visiteurs_id) REFERENCES visiteurs (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9BF668307 FOREIGN KEY (visiteurs_id) REFERENCES visiteurs (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C86024E2 FOREIGN KEY (administrateurs_id) REFERENCES administrateurs (id)');
        $this->addSql('ALTER TABLE visiteurs ADD CONSTRAINT FK_DEFA5132F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cartes DROP FOREIGN KEY FK_D8B89555C86024E2');
        $this->addSql('ALTER TABLE galeries DROP FOREIGN KEY FK_EB9F215AC86024E2');
        $this->addSql('ALTER TABLE horaires DROP FOREIGN KEY FK_39B7118FC86024E2');
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CFC86024E2');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239AB014612');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239BF668307');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9AB014612');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9BF668307');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C86024E2');
        $this->addSql('ALTER TABLE visiteurs DROP FOREIGN KEY FK_DEFA5132F2C56620');
        $this->addSql('DROP TABLE administrateurs');
        $this->addSql('DROP TABLE cartes');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE convives_maximum');
        $this->addSql('DROP TABLE galeries');
        $this->addSql('DROP TABLE horaires');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE visiteurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
