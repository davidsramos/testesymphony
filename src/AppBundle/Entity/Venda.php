<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VENDA
 *
 * @ORM\Table(name="VENDA")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VendaRepository")
 */
class Venda
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
     * @var Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Pessoa", inversedBy="pessoa")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pessoa;    

    /**
     * @var Item[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="Item",
     *      mappedBy="venda",
     *      orphanRemoval=true
     * )
     */
    private $itens;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_emissao", type="datetime")
     */
    private $dataEmissao;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;


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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Venda
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set dataEmissao
     *
     * @param \DateTime $dataEmissao
     *
     * @return Venda
     */
    public function setDataEmissao($dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;

        return $this;
    }

    /**
     * Get dataEmissao
     *
     * @return \DateTime
     */
    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Venda
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set total
     *
     * @param Pessoa $pessoa
     *
     * @return Venda
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get pessoa
     *
     * @return Pessoa
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * Set total
     *
     * @param Item[] $itens
     *
     * @return Venda
     */
    public function setItens($itens)
    {
        $this->itens = $itens;

        return $this;
    }

    /**
     * Get itens
     *
     * @return Item[]
     */
    public function getItens()
    {
        return $this->itens;
    }
}

