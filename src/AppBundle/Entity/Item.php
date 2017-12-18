<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ITEM
 *
 * @ORM\Table(name="ITEM")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 */
class Item
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
     * @var Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto", inversedBy="itens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produto;        

    /**
     * @var Venda
     *
     * @ORM\ManyToOne(targetEntity="Venda", inversedBy="itens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $venda;        

    /**
     * @var float
     *
     * @ORM\Column(name="quantidade", type="float")
     */
    private $quantidade;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_unitario", type="float")
     */
    private $valorUnitario;

    /**
     * @var float
     *
     * @ORM\Column(name="desconto", type="float")
     */
    private $desconto;

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
     * Set quantidade
     *
     * @param float $quantidade
     *
     * @return Item
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return float
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set valorUnitario
     *
     * @param float $valorUnitario
     *
     * @return Item
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;

        return $this;
    }

    /**
     * Get valorUnitario
     *
     * @return float
     */
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    /**
     * Set desconto
     *
     * @param float $desconto
     *
     * @return Item
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }

    /**
     * Get desconto
     *
     * @return float
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Item
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
     * Set produto
     *
     * @param Produto $produto
     *
     * @return Item
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    /**
     * Get produto
     *
     * @return float
     */
    public function getProduto()
    {
        return $this->produto;
    }
    
    /**
     * Set venda
     *
     * @param Venda $venda
     *
     * @return Item
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;

        return $this;
    }

    /**
     * Get venda
     *
     * @return float
     */
    public function getVenda()
    {
        return $this->venda;
    }


}

