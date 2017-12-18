<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PESSOA
 *
 * @ORM\Table(name="PESSOA")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PessoaRepository")
 */
class Pessoa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Venda[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="Venda",
     *      mappedBy="pessoa",
     *      orphanRemoval=true
     * )
     */
    private $vendas;    

    /**
     * @var string
     *
     * @ORM\Column(name="nome_pessoa", type="string", length=150, unique=true)
     */
    private $nomePessoa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="datetime")
     */
    private $dataNascimento;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomePessoa
     *
     * @param string $nomePessoa
     *
     * @return Pessoa
     */
    public function setNomePessoa($nomePessoa)
    {
        $this->nomePessoa = $nomePessoa;

        return $this;
    }

    /**
     * Get nomePessoa
     *
     * @return string
     */
    public function getNomePessoa()
    {
        return $this->nomePessoa;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Pessoa
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set vendas
     *
     * @param Venda $vendas
     *
     * @return Pessoa
     */
    public function setVendas($vendas)
    {
        $this->vendas = $vendas;

        return $this;
    }

    /**
     * Get vendas
     *
     * @return Venda[]
     */
    public function getVendas()
    {
        return $this->vendas;
    }
}

