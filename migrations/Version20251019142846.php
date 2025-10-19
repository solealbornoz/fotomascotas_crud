<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251019142846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__servicio AS SELECT id, nombre, descripcion, precio, fecha, hora, activo, categoria, url_imagen, stock FROM servicio');
        $this->addSql('DROP TABLE servicio');
        $this->addSql('CREATE TABLE servicio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion CLOB NOT NULL, precio INTEGER NOT NULL, fecha DATE NOT NULL, hora TIME NOT NULL, pagado BOOLEAN NOT NULL, categoria VARCHAR(255) NOT NULL, url_imagen VARCHAR(255) DEFAULT NULL, cantidad INTEGER NOT NULL)');
        $this->addSql('INSERT INTO servicio (id, nombre, descripcion, precio, fecha, hora, pagado, categoria, url_imagen, cantidad) SELECT id, nombre, descripcion, precio, fecha, hora, activo, categoria, url_imagen, stock FROM __temp__servicio');
        $this->addSql('DROP TABLE __temp__servicio');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__servicio AS SELECT id, nombre, descripcion, precio, fecha, hora, pagado, categoria, url_imagen, cantidad FROM servicio');
        $this->addSql('DROP TABLE servicio');
        $this->addSql('CREATE TABLE servicio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion CLOB NOT NULL, precio INTEGER NOT NULL, fecha DATE NOT NULL, hora TIME NOT NULL, activo BOOLEAN NOT NULL, categoria VARCHAR(255) NOT NULL, url_imagen VARCHAR(255) DEFAULT NULL, stock INTEGER NOT NULL)');
        $this->addSql('INSERT INTO servicio (id, nombre, descripcion, precio, fecha, hora, activo, categoria, url_imagen, stock) SELECT id, nombre, descripcion, precio, fecha, hora, pagado, categoria, url_imagen, cantidad FROM __temp__servicio');
        $this->addSql('DROP TABLE __temp__servicio');
    }
}
