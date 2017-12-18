<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PRODUTO
 *
 * @ORM\Table(name="PRODUTO")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProdutoRepository")
 */
class Produto
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
     * @var Item[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="Item",
     *      mappedBy="produto",
     *      orphanRemoval=true
     * )
     */
    private $itens;    
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigo_produto", type="string", length=255, unique=true)
     */
    private $codigoProduto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome_produto", type="string", length=255, unique=true)
     */
    private $nomeProduto;

    /**
     * @var float
     *
     * @ORM\Column(name="valor_produto", type="float")
     */
    private $valorProduto;


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
     * Set codigoProduto
     *
     * @param string $codigoProduto
     *
     * @return Produto
     */
    public function setCodigoProduto($codigoProduto)
    {
        $this->codigoProduto = $codigoProduto;

        return $this;
    }

    /**
     * Get codigoProduto
     *
     * @return string
     */
    public function getCodigoProduto()
    {
        return $this->codigoProduto;
    }

    /**
     * Set nomeProduto
     *
     * @param string $nomeProduto
     *
     * @return Produto
     */
    public function setNomeProduto($nomeProduto)
    {
        $this->nomeProduto = $nomeProduto;

        return $this;
    }

    /**
     * Get nomeProduto
     *
     * @return string
     */
    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    /**
     * Set valorProduto
     *
     * @param float $valorProduto
     *
     * @return Produto
     */
    public function setValorProduto($valorProduto)
    {
        $this->valorProduto = $valorProduto;

        return $this;
    }

    /**
     * Get valorProduto
     *
     * @return float
     */
    public function getValorProduto()
    {
        return $this->valorProduto;
    }

    /**
     * Set valorProduto
     *
     * @param Item $itens
     *
     * @return Produto
     */
    public function setItens($itens)
    {
        $this->itens = $itens;

        return $this;
    }

    /**
     * Get itens
     *
     * @return Item
     */
    public function getItens()
    {
        return $this->itens;
    }
}

