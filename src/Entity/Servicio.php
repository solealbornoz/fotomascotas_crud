<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Servicio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: 'text')]
    private ?string $descripcion = null;

    #[ORM\Column]
    private ?int $precio = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $hora = null;

    #[ORM\Column]
    private ?bool $pagado = null;

    #[ORM\Column(length: 255)]
    private ?string $categoria = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlImagen = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    public function getId(): ?int { return $this->id; }

    public function getNombre(): ?string { return $this->nombre; }
    public function setNombre(string $nombre): static { $this->nombre = $nombre; return $this; }

    public function getDescripcion(): ?string { return $this->descripcion; }
    public function setDescripcion(string $descripcion): static { $this->descripcion = $descripcion; return $this; }

    public function getPrecio(): ?int { return $this->precio; }
    public function setPrecio(int $precio): static { $this->precio = $precio; return $this; }

    public function getFecha(): ?\DateTimeInterface { return $this->fecha; }
    public function setFecha(\DateTimeInterface $fecha): static { $this->fecha = $fecha; return $this; }

    public function getHora(): ?\DateTimeInterface { return $this->hora; }
    public function setHora(\DateTimeInterface $hora): static { $this->hora = $hora; return $this; }

    public function isPagado(): ?bool { return $this->pagado; }
    public function setPagado(?bool $pagado): static { $this->pagado = $pagado; return $this; }
   
    public function getCategoria(): ?string { return $this->categoria; }
    public function setCategoria(string $categoria): static { $this->categoria = $categoria; return $this; }

    public function getUrlImagen(): ?string { return $this->urlImagen; }
    public function setUrlImagen(?string $urlImagen): static { $this->urlImagen = $urlImagen; return $this; }

    public function getCantidad(): ?int { return $this->cantidad; }
    public function setCantidad(int $cantidad): static { $this->cantidad = $cantidad; return $this; }
}